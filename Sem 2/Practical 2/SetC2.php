<!Doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SET C2</title>
</head>
<body>
	<h2>Login User</h2>
	<form method="post">
		username : <input type="text" name="name" required> <br> <br>
		Password : <input type="password" name="pass" required> <br> <br>
		<input type="submit" name="submit" value="LOGIN"> <br> <br> <hr> <br>
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])) {

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if($name == "shubham" && $pass== "shubham123") {

		header("Location: SetC2b.php");
		exit();
	}
	else {
		echo "<big><b>Login Failed !</b></big>";
	}
}

?>