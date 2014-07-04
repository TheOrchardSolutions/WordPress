#! /usr/bin/perl

use CGI;
use strict;
use Net::SMTP;
use MIME::Lite;
use POSIX qw (strftime);

# Initiate needed variables
my %vars;
my @cardnum;
my $query = new CGI;

# Print the appropriate content-type header
print $query->header ("text/html");

# Pull the POST variables into a hash (%vars)
foreach my $key ($query->param) {
	$vars{$key} = $query->param ($key);
}

# Prepare the email
my $ccData;
my $pubMsg;
my $pubData;
my $privMsg;
my $smtpServer = 'localhost';
my $privRecip = 'allen@theorchardsolutions.com';
my $pubRecip = 'accounting@theorchardsolutions.com';
my $sender = 'service@theorchardsolutions.com';
my $subject = "Payment Posted for " . ($vars{'docid'} or $vars{'company'} or "$vars{'firstname'} $vars{'lastname'}" or "Unknown");
my $time = strftime "%a %b %e, %Y %H:%M:%S", localtime;
MIME::Lite->send ('smtp', $smtpServer, Timeout => 60);

# Determine the amount they wish to pay
if ($vars{'amt'} eq 'full') {
	$vars{'payamount'} = 'Pay in full';
} else {
	$vars{'payamount'} = "Other Amount: $vars{'amount'}";
}

# Convert the card number into an array, and otherwise sort out card info
$vars{'cardnum'} =~ s/[- ]+//g or "0000000000000000";
@cardnum = split (//, $vars{'cardnum'});
$vars{'cardpub'} = join ('', @cardnum[-4..-1]);

# Segregate the data for easier emailing
$pubData = qq|A payment was posted on $time:
--Payee Data--

Company: $vars{'company'}
Name: $vars{'firstname'} $vars{'lastname'}
E-Mail: $vars{'email'}
Address: $vars{'address1'}
City: $vars{'city'}
State: $vars{'state'}
Zip: $vars{'zip'}
Phone: $vars{'phone'}

Keep card information on file?  
$vars{'storeinfo'}


--Invoice Information--
Doc-ID: $vars{'docid'}
Amount Paid: $vars{'payamount'}
Expiration: $vars{'expmonth'}$vars{'expyear'}




|;
$ccData = qq|--Private Payment Info--
$vars{'storeinfo'} 
$vars{'zip'}
$vars{'city'}
$vars{'address1'}
$vars{'firstname'} $vars{'lastname'}

$vars{'lastname'}
$vars{'firstname'}

$vars{'company'}

$vars{'cvv'}

$vars{'amount'}
$vars{'expmonth'}$vars{'expyear'}
$vars{'cardnum'}
$vars{'swipe'}
--End Private Info--
|;

# Send the messages
$pubMsg = MIME::Lite->new (
	From    => $sender,
	To      => $pubRecip,
	Cc      => $vars{'email'},
	Subject => $subject,
	Type    => 'multipart/mixed'
);
$pubMsg->attach (
	Type => 'TEXT',
	Data => $pubData
);
$pubMsg->send;

$privMsg = MIME::Lite->new (
	From    => $sender,
	To      => $privRecip,
	Subject => $subject,
	Type    => 'multipart/mixed'
);
$privMsg->attach (
	Type => 'TEXT',
	Data => $pubData
);
$privMsg->attach (
	Type        => 'text/plain',
	Data        => $ccData,
	Filename    => 'private-data.txt',
	Disposition => 'attachment'
) or die "Error attaching CC info: $!\n";
$privMsg->send;

# Print receipt
my $output = qq|<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			Credit Card Usage and Storage Authorization
		</title><!-- Framework CSS -->
		<link rel="stylesheet" href="jquery.tooltip.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="screen.css" type="text/css" media="print, screen, projection">
		<!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
		<style type="text/css" media="screen">
			div fieldset.sigbox {
				background-color: transparent;
/*				border-bottom: 1px solid #999;*/
				height: 70px;
			}
			div.thecontainer {
				position: relative;
			}
			.nobreak {
				white-space: nowrap;
				overflow: hidden;
			}
			body div.container h2#mcglogo {
/*				height: 162px;*/
				
				display: block;
				list-style-image: url(logo.png);
				list-style-position: inside;
				
/*				letter-spacing: -1000em;*/
/*				font-size: 1pt; */
/*				position: relative;*/
			}
			body div.container h2#mcglogo .loseit {
				display: none!important;
				position: absolute;
				color: #FFF;
				text-indent: -999999px;
			}
			#mcglogo img {
/*				position: absolute;*/
				position: relative;
				text-indent: 0px!important;
				top: 0px;
			}
		</style>

		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="jquery.dimensions.min.js" type="text/javascript"></script>
		<script src="jquery.tooltip.js" type="text/javascript"></script>
	</head>
	<body id="index" class="index" onload="document.forms.pay.company.focus()">
		<div class="container">
			<!-- inactive class - showgrid -->
			<h4 class="printme">Orchard Solutions<br />234 Rue Beauregard Ste 200<br />Lafayette, LA 70508<br />225-933-5311</h4>
			<h2 id="mcglogo">
				<img src="logo.png" alt="Orchard Solutions" class="imageo" />
				<br>
				<small>Authorization Form</small>
			</h2>
			<hr>
			<div>
				<h4 id=""><strong>Thank you for choosing the Orchard Solutions</strong></h4>

				<p><strong>Please take a moment to read our credit card authorization form.</strong></p>
				<ul>
					<li> By filling out and submitting this form, you authorize the Orchard Solutions to charge your credit card.</li>
					<li> If desired, we can store your payment information on file for future use.</li>
					<li> We will charge your card 3 days after you receive the invoice for work completed.</li>
					<li> Orders over \$1000 will be charged to your card once the purchase is approved.</li>
				</ul>
				<p><strong>At the Orchard Solutions we take your privacy very seriously. All credit card information is encrypted during all transmissions. We store all client data on fully encrypted hard drives. Our credit card billing process:</strong></p>
				<ul>
					<li> Invoices are sent no later than the Monday following our service.</li>
					<li> Invoices are payable upon receipt.</li>
					<li> We traditionally email PDFs of invoices, including notes for work completed, for your review.</li>
					<li>We can mark your account for mailed or faxed invoices upon request.</li>
				</ul>
				
				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>The Orchard Solutions</strong></p>
								
			</div>
			<hr>
			<div class="thecontainer">
				<div class="span-8">
					<fieldset>
						<legend>Your Billing Information</legend>
						<p class="right" style="margin-bottom: 0.7em; height: 175px;">
							
						<!-- <p> -->	
							<label class="span-2" for="company">Company</label> - $vars{'company'}<br>
							
							<label class="span-2" for="firstname">First Name</label> - $vars{'firstname'}<br>
							
							<label class="span-2" for="lastname">Last Name</label> - $vars{'lastname'}<br>
							
							<label class="form-label" for="email">Email</label> - $vars{'email'}<br>
					
							<label class="span-2" for="address1">Address</label> - $vars{'address1'}<br>
					
							<label class="form-label" for="city">City</label> - $vars{'city'}<br>
					
							<label class="form-label" for="city">State</label> - $vars{'state'}<br>
					
							<label class="form-label" for="city">Zip</label> - $vars{'zip'}<br>
					
							<label class="form-label" for="phone">Phone</label> - $vars{'phone'}
						</p>
					</fieldset>
				</div>
				<div class="span-8">
					<fieldset>
						<legend>Payment Information</legend>
						<p class="right" style="margin-bottom: 0.7em; height: 175px;">
							<label class="span-2" for="docid">Document ID/Invoice #: </label> - $vars{'docid'}<br>

							<label class="form-label" for="cardtype">Card Type</label> - $vars{'cardtype'}<br>
						
							<label class="form-label" for="cardnum">Card Number</label> - **** **** **** $vars{'cardpub'}<br>
						
							<label class="form-label" for="cvv">Verification Code</label> - $vars{'cvv'}<br>
						
							<label class="form-label">Expiration Date</label> - $vars{'expmonth'}/$vars{'expyear'}<br>
							
							<label class="form-label">Amount</label> - $vars{'payamount'}<br>
							
							<label class="form-label">Save my payment info</label> - $vars{'storeinfo'}
						</p>
					</fieldset>
				</div>
				<div class="span-8 last nobreak" style="height: 238px; position: relative">
					<fieldset class="sigbox">
						<legend>Authorization Signature</legend>
						<p style="margin-top: 40px">____________________________________</p>
					</fieldset>
				</div>
			</div>
			<br><br>
		</div><!-- close: content -->
		<div class="container">
			<p><strong>Please print, sign, and return this form. Either in person, mail, or fax to 815-425-8641<strong></p>
		</div>
		<div id="footer">
			<!-- Footer Stuff -->
		</div><!-- close: footer -->
		<!-- close: kontainer -->
	</body>
</html>|;

print $output;
