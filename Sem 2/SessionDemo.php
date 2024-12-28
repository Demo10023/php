<!Doctype html>
<html>
<head>
	<title>Session Demo</title>
</head>
<body>
	<form method="post">
		<input type="text" name="user" placeholder="Enter name"> <br><br>
		<button name="button" value="set" >Set Session</button> <br> <br>
		<button name="button" value="get" >Get Session</button> <br> <br>
		<button name="button" value="delete" >Delete Session</button> <br><br>		
	</form>
</body>
</html>

<?php
session_start();

if(isset($_POST['button'])) {

	if($_POST['button']=="set") {

		$user = $_POST['user'];
		$_SESSION['user'] = $user;

	}

	if($_POST['button']=="get") {

		echo $_SESSION['user'];

	}

	if($_POST['button']=="delete") {

		session_destroy();
	}
}


?>