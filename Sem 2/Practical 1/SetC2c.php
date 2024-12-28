<?php

session_start();

?>

<!Doctype html>
<html>
<head>
	<title>SET C2</title>
</head>
<body>
	<h1>Customers Information</h1>
	<hr>
	Name : <?php echo $_SESSION['name'];?> <br><br>
	Address : <?php echo $_SESSION['address'];?> <br><br>
	Phone no : <?php echo $_SESSION['phone'];?> <br><br> <br>
	<hr>
	<h1>Product Information</h1>
	<hr>
	Product : <?php echo $_SESSION['product'];?> <br><br>
	Quantity : <?php echo $_SESSION['quantity'];?> <br><br>
	Rate : <?php echo $_SESSION['rate'];?> <br><br>
	<hr>

</body>
</html>