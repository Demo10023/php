<!Doctype html>
<html>
<head>
	<title>SET B2</title>
</head>
<body>
	<h2>Student's Information</h2>
	<form method="post">
		Enter Marks<br>
		Physics   : <input type="text" name="physics" required> <br> <br>
	    Biology   : <input type="text" name="biology"> <br> <br>
		Chemistry : <input type="text" name="chemistry"> <br> <br>
		Maths     : <input type="text" name="maths"> <br> <br>
		Marathi   : <input type="text" name="marathi"> <br> <br>
		English   : <input type="text" name="english"> <br> <br>
		<input type="submit" name="submit" value="SUBMIT"> 		
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])) {

	session_start();
	$_SESSION['physics'] = (int) $_POST['physics'];
	$_SESSION['biology'] = $_POST['biology'];
	$_SESSION['chemistry'] = $_POST['chemistry'];
	$_SESSION['maths'] = $_POST['maths'];
	$_SESSION['marathi'] = $_POST['marathi'];
	$_SESSION['english'] = $_POST['english'];

	header("Location: SetB2c.php");
	exit();
}

?>