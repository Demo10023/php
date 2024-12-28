<!Doctype Html>
<html>
<head>
	<title>SET A1</title>
</head>
<body>
	<?php
	if(isset($_GET['message'])) {
		echo "<p style='color: red;'>".htmlspecialchars($_GET['message'])."</p>";
	}
	?>
	<form method="post">
		<input type="text" name="user" placeholder="Enter name"> <br> <br>
		<input type="password" name="psw" placeholder="Password"> <br> <br>
		<input type="submit" name="submit" value="Login"> <br> <br>		
	</form>

<?PHP
session_start();

if(isset($_POST['submit'])) {

	$user = $_POST['user'];
	$psw = $_POST['psw'];

	if($user==="shubham" && $psw==="pass") {

		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $user;
		$_SESSION['start_time'] = time();

		header("Location: SetA22.php");
		exit();		
	} else {
		echo"<p style='color: red;'>Invalid username or password. Please try again.</p>";
	}
}
?>

</body>
</html>