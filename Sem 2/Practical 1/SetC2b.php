<?php

session_start();

if($_SERVER['REQUEST_METHOD']== 'POST') {

	$_SESSION['product'] = $_POST['product'];
	$_SESSION['quantity'] = $_POST['quantity'];
	$_SESSION['rate'] = $_POST['rate'];

	header("Location: SetC2c.php");
}
?>

<!Doctype html>
<html>
<head>
	<title>SET C2</title>
</head>
<body>
	<h1>Product Information</h1>
	<form method="POST">
		Product : <input type="text" name="product" required> <br> <br>
		Quantity : <input type="number" name="quantity" required> <br> <br>
		Rate : <input type="number" name="rate" required> <br> <br>
		<input type="submit" name="submit" value="next" required> <br> <br>	
	</form>
</body>
</html>