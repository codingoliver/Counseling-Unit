<?php include 'includes/header_top.html'; ?>

<title>Contact Me - On Line Counselling Affordable, Skype On Line Counselling Via On Line Chat, Psychologist</title>
<?php
include 'includes/header_bottom.html';
include 'includes/nav.html';
?>
		<div class="row contact">
			<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
				<h2>Please feel free to contact me</h2>
				<form action="Action/contact.php" method="post">
					<div class="form-group ">
						<label for="name">Full name</label>
						<input type="text" class="form-control" id="inputHelpBlock name" placeholder="Please enter your name" name="name" aria-describedby="helpBlock" autofocus>
						<span id="helpBlock" class="help-block important">Leave this field blank if you wish to keep your anonymity.</span>
					</div>
					<div class="form-group">
						<label for="email">Email address<b class="asterisk">*</b></label>
						<input type="email" id="email" class="form-control" placeholder="Please enter your e-mail address" name="email" aria-describedby="helpBlock" required>
					</div>
					<div class="form-group">
						<label for="subject">Subject<b class="asterisk">*</b></label>
						<input type="text" id="subject" class="form-control" placeholder="Please enter a subject" name="subject" aria-describedby="helpBlock" required>
					</div>
					<div class="form-group">
						<label for="Email">Message<b class="asterisk">*</b></label>
						<textarea class="form-control" id="message" rows="7" cols="100" maxlength="1000" required placeholder="Please enter your message"></textarea>
					</div>
					<div class="form-group">
						<div class="g-recaptcha" data-sitekey="6LfypyQTAAAAAE6KccNeAwM2RfU4QEJTSasEokjB"></div>
					</div>
					<label class="check">
						<input type="checkbox" required>Check here to receive email updates
					</label>
					<button type="submit" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
<?php
include'includes/socialicons.html';
include'includes/footer.php';
?>