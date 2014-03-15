#! /usr/bin/perl

use CGI;
use strict;
use Mail::Mailer;
use POSIX qw (strftime);

# Initiate needed variables
my %vars;
my $query = new CGI;
my $mailer = new Mail::Mailer ('smtp', Server => 'mail.mcghosting.com');

# Print the appropriate content-type header
print $query->header ("text/html");
# Pull the POST variables into a hash (%vars)
foreach my $key ($query->param) {
	$vars{$key} = $query->param ($key);
}

# Prepare the email
my $recip = 'support@macconsultinggroup.com';
my $sender = 'dropoff@mcghosting.com';
my $subject = "Access Policy Accepted";
my $time = strftime "%a %b %e, %Y %H:%M:%S", localtime;

# Compose the body of the email
my $body = qq|As of: $time
The MCG Access Policy (http://macconsultinggroup.com/accesspolicy/) has been accepted by:
$vars{'name'} <$vars{'email'}>, $vars{'title1'} of $vars{'company'}
|;

# Send the message
$mailer->open ({
  To      => $recip,
  From    => $sender,
  Subject => $subject
});
print $mailer $body;
$mailer->close () or die "Error sending mail. $!\n";

# Format output
my $output = qq|<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			Storage and usage Policy
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
			<h4 class="printme">Mac Consulting Group Inc<br />8568 Goodwood Blvd Suite B<br />Baton Rouge, LA 70806<br />225-933-5311</h4>
			<h2 id="mcglogo">
				<img src="logo.png" alt="Mac Consulting Group" class="imageo" />
				<br>
				<small>Storage and usage Policy</small>
			</h2>
			<hr>
			<div>
				<h4 id=""><strong>Thank you for choosing the Mac Consulting Group, Inc for your computer repair.</strong></h4>

				<p><strong>Define the storage and usage policy for our private Remote Access used by the  between Mac Consulting Group, Inc. and your organization’s network and computer systems.</strong></p>
				<ul>
					<li>This Policy applies to the implementation of Remote Access and VPN Access that allows direct connections to your company’s network from outside your network. This policy will be used to authorize Remote Access and VPN Access by Mac Consulting Group, Inc. for use with your organization’s network and computer systems.</strong>.</li>

					<li>It is important to note that we do not charge for any service covered by your AppleCare warranty.</li>

					<li>Remote Access is direct remote access to a computer system through use of remote support software, which includes but is not limited to, Apple Remote Desktop, Screen Sharing, Mac HelpMate, TeamViewer, and Microsoft Remote Desktop Connection.
A Virtual Private Network (VPN) is a private network that is formed by joining two or more nodes together through an encrypted IP tunnel over the internet. This tunnel treats both end points as if they were directly joined on a local area network (LAN). A VPN connection can be be created a number of ways, including by not limited to: router to router connections, router to client connections, and server to client connections.
</li>

					<li>I grant Mac Consulting Group, Inc. access to our computer systems and network utilizing Remote Access and VPN technologies. I understand that this is granted access to includes all technical staff, including but not limited to: technicians, consultants, and contractors operating through Mac Consulting Group, Inc. </li>
				</ul>
				
			</div>
			<hr>
			<div class="thecontainer">
				<div class="span-8">
					<fieldset>
						<legend>Your Information</legend>
						<p class="right" style="margin-bottom: 0.7em; height: 105px;">
							
						<!-- <p> -->	
							<label class="span-2" for="firstname">Name</label> - $vars{'name'}<br>							

							<label class="span-2" for="company">Company</label> - $vars{'company'}<br>
														
							<label class="form-label" for="email">Email</label> - $vars{'email'}<br>
							
					
							<label class="span-2" for="address1">Title</label> - $vars{'title1'}<br>
					
						</p>
					</fieldset>
				</div>
				<div class="span-12 last nobreak" style="height: 178px; position: relative">
					<fieldset class="sigbox">
						<legend>Authorization Signature</legend>
						<p style="margin-top: 40px">___________________________________________________</p>
					</fieldset>
				</div>
			</div>
		</div><!-- close: content -->
		<div id="footer">
			<!-- Footer Stuff -->
		</div><!-- close: footer -->
		<!-- close: kontainer -->
	</body>
</html>|;

print $output;
