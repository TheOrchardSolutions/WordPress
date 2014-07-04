#! /usr/bin/perl

use CGI;
use strict;

my $query = new CGI;
my ($output, $buffer, @pairs, %vars);
my $fullAmtChecked = 'checked';
my $otherAmtChecked = '';

print $query->header ("text/html");

$buffer = $ENV{'QUERY_STRING'};
@pairs = split (/&/, $buffer);
foreach my $pair (@pairs) {
	my ($key, $val) = split (/=/, $pair);
	$vars{lc ($key)} = $val;
	if (lc ($key) == 'amount') {
		$vars{'amt'} = 'other';
		($fullAmtChecked, $otherAmtChecked) = ($otherAmtChecked, $fullAmtChecked);
	}
}


#
#  The screen.css file is the primary stylesheet  (where style.css would normally be)
#


$output = qq|
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<title>
			Payment Form
		</title><!-- Framework CSS -->
		<link rel="stylesheet" href="jquery.tooltip.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="print.css" type="text/css" media="print"><!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->

		<script src="jquery.min.js" type="text/javascript"></script>
		<script src="jquery.dimensions.min.js" type="text/javascript"></script>
		<script src="jquery.tooltip.js" type="text/javascript"></script>
	</head>
	<body id="index" class="index" onload="document.forms.pay.company.focus()">
		<div class="container">
			<!-- inactive class - showgrid -->
			<h4 class="printme">Orchard Solutions<br />234 Rue Beauregard Ste 200<br />Lafayette, LA 70508<br />225-933-5311</h4>
			<h2 id="mcglogo">
				<br>
				<small>Payment Form</small>
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
				<p><strong>Please print, sign, and return this form. Either in person, mail, or fax to 815-425-8641</strong></p>
				<p><strong>At the Orchard Solutions we take your privacy very seriously. All credit card information is encrypted during all transmissions. We store all client data on fully encrypted hard drives. Our credit card billing process:</strong></p>
				<ul>
					<li> Invoices are sent no later than the Monday following our service.</li>
					<li> Invoices are payable upon receipt.</li>
					<li> We traditionally email PDFs of invoices, including notes for work completed, for your review.</li>
					<li>We can mark your account for mailed or faxed invoices upon request.</li>
				</ul>
				
				<p style="text-align: right;"><em>Sincerely,</em><br> <strong>Orchard Solutions</strong></p>
				
			</div>
			<hr>
			<!-- <div class="span-8"> -->
			<form action="submitpayment.pl" method="post" accept-charset="utf-8" name="pay" id="pay">
				<div class="span-8">
					<fieldset>
						<legend><span class="order_num">1</span> Your Billing Information</legend>
						<p class="right" style="margin-bottom: 0.7em;">
							
						<!-- <p> -->	
							<label class="span-2" for="company">Company (if applicable)</label><br>
							<input type="text" name="company" value="$vars{'company'}" id="company" class="text"><br>
							
							<label class="span-2" for="firstname">First Name</label><br>
							<input type="text" name="firstname" value="$vars{'firstname'}" id="firstname" class="text"><br>
							
							<label class="span-2" for="lastname">Last Name</label><br>
							<input type="text" name="lastname" value="$vars{'lastname'}" id="lastname" class="text"><br>
							
							<label class="form-label" for="email">Email</label><br>
							<input type="text" name="email" value="$vars{'email'}" id="email" class="text">
							
					
							<label class="span-2" for="address1">Address</label><br>
							<input type="text" name="address1" value="$vars{'address1'}" id="address1" class="text"><br>
					
							<label class="form-label" for="city">City</label><br>
							<input type="text" name="city" value="$vars{'city'}" id="city" class="text"><br>
					
							<label class="form-label" for="city">State</label><br>
							<input type="text" name="state" value="$vars{'state'}" id="state" class="text"><br>
					
							<label class="form-label" for="city">Zip</label><br>
							<input type="text" name="zip" value="$vars{'zip'}" id="zip" class="text"><br>
					
							<label class="form-label" for="phone">Phone</label><br>
							<input type="text" name="phone" value="$vars{'phone'}" id="phone" class="text">
							<br><br><br><br><br>
						</p>
					</fieldset>
				</div>
				<div class="span-8">
					<fieldset>
						<legend><span class="order_num">2</span> Payment</legend>
						<p class="right">
								<label class="span-2" for="docid">Document Number (ie Q-8888 or I-12345): <br> <font size="1">(We review this manually)</font>  </label><br>
								<input type="text" name="docid" value="$vars{'docid'}" id="docid" class="text"><br>

								<div style="float: left; width: 40%">
									<label class="form-label" for="cardtype">Card Type</label><br>
									<select name="cardtype" value="$vars{'cardtype'}" id="cardtype">
										<option value="--">--</option>
										<option value="visa">Visa</option>
										<option value="mc">Master Card</option>
										<option value="disc">Discover</option>
										<option value="amex">Amex</option>
									</select><br>
								</div> <!-- close: name -->

								<div style="float: left; width: 40%">
									<label class="form-label" for="cvv">Verification Code</label><br>
									<input type="text" name="cvv" value="$vars{'cvv'}" id="cvv" class="text" style="width:30px;"><br>
								</div> <!-- close: name -->

								<br style="clear: left;" />

								<label class="form-label" for="cardnum">Card Number</label><br>
								<input type="text" name="cardnum" value="$vars{'cardnum'}" id="cardnum" class="text"><br>
							
								<label class="form-label">Expiration Date</label><br>
								<select name="expmonth" value="$vars{'expmonth'}" id="expmonth">
									<option value="--">--</option>
									<option value="01">Jan</option>
									<option value="02">Feb</option>
									<option value="03">Mar</option>
									<option value="04">Apr</option>
									<option value="05">May</option>
									<option value="06">Jun</option>
									<option value="07">Jul</option>
									<option value="08">Aug</option>
									<option value="09">Sep</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>
									<option value="12">Dec</option>
								</select>
								<select name="expyear" value="$vars{'expyear'}" id="expyear">
									<option value="--">----</option>
									<option value="10">2010</option>
									<option value="11">2011</option>
									<option value="12">2012</option>
									<option value="13">2013</option>
									<option value="14">2014</option>
									<option value="15">2015</option>
									<option value="16">2016</option>
									<option value="17">2017</option>
									<option value="18">2018</option>
								</select><br>
								
								<label class="form-label">Amount</label><br>
								<input type="radio" name="amt" value="full" id="amt" class="radio" $fullAmtChecked>Pay in full<br>
								<input type="radio" name="amt" value="other" id="amt" class="radio" $otherAmtChecked>Other Amount:
								<input type="text" name="amount" value="$vars{'amount'}" id="amount" class="text"><br>
								
								<p><label class="form-label">May we store your payment information?</label><br>
								<input type="radio" name="storeinfo" value="yes" id="dostoreinfo" class="radio">
								<label for="dostoreinfo" style="font-weight: normal;">Yes, I authorize you to store this payment method.</label><br />
								
								<input type="radio" name="storeinfo" value="no" id="dontstoreinfo" class="radio">
								<label for="dontstoreinfo" style="font-weight: normal;">No, do not store this information at this time.</label></p>
								<p>
									<input type="submit" value="Submit Payment Information &rarr;" class="order">
								</p>
								
							</span>
						</p>
					</fieldset>
				</div>
								<!-- 
				<div class="span-15">
					<fieldset>
						<legend><span class="order_num">2</span> Description of the Service Needed</legend>
						<div class="span-15">
						<div id="problem_list">
							<p>
								<label for="problem">Briefly describe the problem/concern</label><br>
								<label>Click applicable issues</label><br> 
								<input type="checkbox" name="power" value=" the computer isn't getting power," id="power"> <label for="power" class="itemlabel">No power</label> <input type="checkbox" name="boot" value=" the machine won't boot properly," id="boot"> <label for="boot" class="itemlabel">Won't boot properly</label> <input type="checkbox" name="noises" value=" I am hearing strange noises," id="noises"> <label for="noises" class="itemlabel">Making odd noises</label> <input type="checkbox" name="backup" value=" I am in need of a backup system," id="backup"> <label for="backup" class="itemlabel">I need a backup system</label>
								<textarea name="problem" id="problem" class="default-value" rows="4" cols="20"></textarea><br>
								<small>Any long description is best handled over the phone.</small><br>
							</p>
						</div> close:  
					</div> close:  
						<label>Also Dropped off</label>
						<legend><span class="order">3</span> Also Dropped off</legend> 
						<div id="materials_list" class="span-15">
							<input class="isacheckbox" type="checkbox" name="keyboard" value=" Keyboard," id="keyboard"> <label class="itemlabel" for="keyboard">Keyboard</label> <input class="isacheckbox" type="checkbox" name="mouse" value=" Mouse," id="mouse"> <label class="itemlabel" for="mouse">Mouse</label> <input class="isacheckbox" type="checkbox" name="power-cord" value=" Power Cord," id="power-cord"> <label class="itemlabel" for="power-cord">Power cord</label> <input class="isacheckbox" type="checkbox" name="cd-dvd" value=" CD/DVD," id="cd-dvd"> <label class="itemlabel" for="cd-dvd">CD/DVD</label> <input class="isacheckbox" type="checkbox" name="software" value=" Software," id="software"> <label class="itemlabel" for="software">Software</label>  <input type="checkbox" name="custom1-check" value="" id="custom1-check">&nbsp; <br>
							 <input type="text" class="text default-value" name="accessories" value="" id="accessories"><br> 
							 <textarea name="accessories" id="accessories" rows="5" cols="4"> 
							<br>
							 <input type="checkbox" name="custom2-check" value="" id="custom2-check">&nbsp; 
							  <input type="text" name="custom2-text" value="" id="custom2-text"> 
						</div>
					</fieldset>
					<fieldset>
						<legend><span class="order_num">3</span> Your Computer's Information</legend>
						<div class="span-15">
						<table border="0" cellspacing="5" cellpadding="5" style="clear: left">
							<tr>
								<th>
									Equipment Name (<abbr style="cursor: help;" title="Equipment Name - This is what sort of computer or item you are submitting for repair" class="tooltipme">?</abbr>)
								</th>
								<th>
									Computer Serial (<a href="http://support.apple.com/kb/HT1349" target="_blank" style="cursor: help;" title="Computer Serial - Please include your serial number. Click here if you are unsure about how to get it." class="tooltipmeleft">?</a>)
								</th>
								<th>
									Username/Password (<abbr style="cursor: help;" title="Username and Password - Access to a user account on the machine is required to verify the repair. Feel free to set it to <strong>password</strong> for the duration" class="tooltipmeleft">?</abbr>)
								</th><th>Password</th>
							</tr>
							<tr>
								<td>
									<input type="text" name="equipment1-name" value="" id="equipment1-name" class="text">
								</td>
								<td>
									<input type="text" name="equipment1-serial" value="" id="equipment1-serial" class="text">
								</td>
								<td>
									<input type="text" name="equipment1-user" value="" id="equipment1-user" class="text">
								</td><td><input type="text" name="equipment1-pass" value="" id="equipment1-pass" class="text"></td>
							</tr>
						</table>
						</div> close: span-8 
						<div class="span-15 last">
							<p>
							<p>
								In the case of warranty repairs, this information will be shared with Apple, Inc.<br>
								If you prefer not to have your email address shared with Apple, check this box. <input type="checkbox" name="privacy" value="" id="privacy"><br>
							</p>
							<p>
							<p>
							<p>
								<input type="submit" value="4. Create Service Request ‚Üí" class="order">
							</p>
						</div> close: span-16 
					-->
					</fieldset>
				</div>
			</form>
		</div><!-- close: content -->
		<div id="footer">
			<!-- Footer Stuff -->
		</div><!-- close: footer -->
		<!-- close: kontainer -->
	</body>
</html>
|;

print $outpu