<?php
require_once("/inc/config.php");
$status = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = trim($_POST["fname"]);
	$lname = trim($_POST["lname"]);
	$name = $fname . " " . $lname;
	$email = trim($_POST["email"]);
	$subject = trim($_POST["subject"]);
	$message = trim($_POST["message"]);
	
	/*/ check for blank fields
	if($name == "" OR $email == "" OR $subject == "" OR $message == ""){
		$error_messages[] = "Please fill in all required fields";
	}
	// check for valid data
	foreach($_POST as $value) {
		if(stripos($value, 'Content-Type:') !== FALSE) {
			$error_messages[] = "There was a problem with the information you entered.";
		}
	}
	// check for spam bots
	if($_POST["address"] != ""){
		$error_messages[] = "There was a problem with the information you entered.";
	} */
	
	require_once(ROOT_PATH . "inc/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	$email_body = "Hello there spiffy,<br>" . $name . " has a message for you.<br>Subject: " . $subject . "<br>Message: " . $message . "<br>" . $name . " can be reached by emailing " . $email . ".";
	$email_body = eregi_replace("[\]",'',$email_body);
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "box494.bluehost.com";	
	$mail->Port = 465;
	$mail->Username = "bethany@webbybethany.com";
	$mail->Password = "tr@vellife";
	$address = "bethany@webbybethany.com";
	$mail->AddReplyTo($address, 'Web by Bethany');
	$mail->From = $address;
	$mail->FromName = $name;
	$mail->Subject = "Food Jumble Form Submission " . $name;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($email_body);
	$mail->AddAddress($address, "Web By Bethany");

	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		$status = "thanks";
	}
}
?><?php
$pageTitle = "Food Jumble | Get in Touch";
$page = "contact";
include(ROOT_PATH . 'inc/header.php'); ?>	
	<div class="content-container contact">
	<div class="border row">
		<div class="small-12 small-centered inside-content">
		<div class="row">
			<div class="small-10 large-8 columns small-offset-1 large-offset-2">
			<?php if (isset($status) && $status == "thanks") { ?>
				<h2>Thanks for your Message!</h2>
				<p>We appreciate your time and will be back in touch shortly.</p>
			<?php } else { ?>
				<h2>Got Something to Share?</h2>
				<p>We would love to hear from you! You can share your thoughts below by filling in our simple form.</p>
			</div>
			</div>
		<div class="row">
		<div class="small-10 large-8 columns small-offset-1 large-offset-2">
		<form method="post" action="<?php echo BASE_URL; ?>contact.php">
			<div class="row">
				<div class="small-10 large-8 columns large-offset-2">
					<div class="row">
					<div class="small-3 columns">
						<label class="right inline">Your Name</label>
					</div>
					<div class="small-4 columns">
						<input type="text" placeholder="First name" name="fname" id="fname" value="<?php if(isset($fname) && $status != "thanks") {echo htmlspecialchars($fname);} ?>" required />
					</div>
					<div class="small-5 columns">
						<input type="text" placeholder="Last name" name="lname" id="lname" value="<?php if(isset($lname) && $status != "thanks") {echo htmlspecialchars($lname);} ?>" required />
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="small-10 large-8 columns large-offset-2" >
					<div class="row">
					<div class="small-3 columns">
						<label class="right inline">Email</label>
					</div>
					<div class="small-9 columns">
						<input type="email" placeholder="email@mydomain.com" name="email" id="email" value="<?php if(isset($email) && $status != "thanks") {echo htmlspecialchars($email);} ?>" required />
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="small-10 large-8 columns large-offset-2">
					<div class="row">
					<div class="small-3 columns">
						<label class="right inline">Subject</label>
					</div>
					<div class="small-9 columns">
						<input type="text" placeholder="Reason for the message" name="subject" id="subject" value="<?php if(isset($subject) && $status != "thanks") {echo htmlspecialchars($subject);} ?>" required/>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="small-10 large-8 columns large-offset-2">
					<div class="row">
					<div class="small-3 columns">
						<label class="right inline">Message</label>
					</div>
					<div class="small-9 columns">
						<textarea name="message" id="message"><?php if(isset($message) && $status != "thanks") {echo htmlspecialchars($message);} ?> </textarea>
					</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="address" />
			<div class="row">
			<div class="small-6 columns small-offset-3">
				<input class="home-signup" type="submit" value="Send">
			</div>
			</div>
		</form>
		</div>
		</div>
		<?php } ?>
		</div>
		</div>
	</div>
	</div>
<?php include(ROOT_PATH . 'inc/footer.php'); ?>