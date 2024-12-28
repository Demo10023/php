<!Doctype html>
<html>
<head>
	<title>SET A1</title>
</head>
<body>
	<h2>Email Details</h2>
	<form method="post">
		Enter Detail's For E-mail <Br>
		From : <input type="email" name="from" required> <br> <br>
		To : <input type="email" name="to" required> <br> <br>
		Subject : <input type="text" name="subject" required> <br> <br>
		Text : <textarea name="text" required></textarea>

		<input type="submit" name="send" value="SEND">	<br> <br>	<hr>
	</form>
</body>

<?php

if(isset($_POST['send'])) {

	$from =filter_var($_POST['from'], FILTER_SANITIZE_EMAIL);
	$to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
	$subject = htmlspecialchars($_POST['subject']);
	$text = htmlspecialchars($_POST['text']);

	if(filter_var($to, FILTER_VALIDATE_EMAIL) && filter_var($from, FILTER_VALIDATE_EMAIL)) {

		$headers = "From: $from";

		if(mail($to, $subject, $text, $headers)) {

			echo "<big><b>Email sent Successfully !</b></big>";
	} else {
		echo "<big><b>Email has been not sent !</b></big>";
	}
}  else {

	echo "<big><b>Invalid Email Address!</b></big>";
}

}

?>