<!Doctype html>
<html>
<head>
	<title>SET B2</title>
</head>
<body>
	<h2>Student's Information</h2>
	<form method="post">
		Name : <input type="text" name="name" required> <br> <br>
	    Class : <input type="text" name="class"> <br> <br>
		Address : <input type="text" name="address"> <br> <br>
		<input type="submit" name="submit" value="NEXT"> 		
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])) {

	session_start();
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['class'] = $_POST['class'];
	$_SESSION['address'] = $_POST['address'];

	header("Location: SetB2b.php");
	exit();
}

?>