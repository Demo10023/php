<?php

session_start();

if(isset($_POST['submit'])) {

	$_SESSION['name'] = $_POST['name'];
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['phone'] = $_POST['phone'];

	header("Location: SetC2b.php");
	exit();
}
?>

<!Doctype html>
<html>
<head>
	<title>SET C2</title>
</head>
<body>
	<h1>Customers Information</h1>
	<form method="POST">
		Name : <input type="text" name="name" required> <br> <br>
		Address : <input type="text" name="address" required> <br> <br>
		Phone no : <input type="number" name="phone" required> <br> <br>
		<input type="submit" name="submit" value="next" required> <br> <br>	
	</form>
</body>
</html>