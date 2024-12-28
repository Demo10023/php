<!Doctype html>
<html>
<head>
	<title>SET C2</title>
</head>
<body>
	<h2>Email Details</h2>
	<form method="post">
		Enter Detail's For E-mail <Br>
		From : <input type="email" name="from" value="shubhambhosale2512@gmail.com" required> <br> <br>
		To : <input type="text" name="to" required> <br> <br>
		Subject : <input type="text" name="subject" required> <br> <br>
		Text : <textarea name="text" required></textarea>

		<input type="submit" name="send" value="SEND">	<br> <br>	<hr>
	</form>
</body>

<?php

if(isset($_POST['send'])) {

	$to = $_POST['to'];
	$to_many = explode(",",$to);
	$subject = htmlspecialchars($_POST['subject']);
	$text = htmlspecialchars($_POST['text']);

	foreach($to_many as $email) {

	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

		if(mail($email, $subject, $text)) {

			echo "<big><b>Email $email sent Successfully !</b></big><br>";
	} else {
		echo "<big><b>Email $email has been not sent !</b></big>";
	}
}  else {

	echo "<big><b>Invalid Email Address!</b></big>";
}
 }

}

?>