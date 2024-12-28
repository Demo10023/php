<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: SetA1.php?message=Please log in first.");
	exit();
}

$timeout_duration = 60; 
$current_time = time();

if (isset($_SESSION['start_time']) && ($current_time - $_SESSION['start_time']) > $timeout_duration) {
	// Session expired
	session_unset();
	session_destroy();
	header("Location: SetA1.php?message=Session expired. Please log in again."); // Redirect to login
	exit();
}

$_SESSION['start_time'] = $current_time;

?>

<!DOCTYPE html>
<html>
<head>
	<title>SET A1</title>
</head>
<body>
	<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
	<p>Here you can enter your details.</p>
	<form method="post">
		Name  :	<input type="text" name="name" required><br><br>
		City  :	<input type="text" name="city" required><br><br>
		Phone :	<input type="text" name="phone" required><br><br>
		<input type="submit" name="Submit">	
	</form>

<?php

if(isset($_POST['Submit'])) {

 $name = $_POST['name'];
 $city = $_POST['city'];
 $phone = $_POST['phone'];

 // Process the user details (for now, we just display them)
 echo "<h3>Details Submitted:</h3>";
 echo "Name: " . htmlspecialchars($name) . "<br>";
 echo "City: " . htmlspecialchars($city) . "<br>";
 echo "Phone: " . htmlspecialchars($phone) . "<br>";

//header("Location: SetA1.php");
echo "<p> <a href='logout.php'>Logout</a></p>";
}

?>

</body>
</html>