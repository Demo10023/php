<?php

if(isset($_COOKIE['visit_count'])) {

	$visit_count = (int) $_COOKIE['visit_count'] + 1;
} else {
	$visit_count = 1;
}

setcookie('visit_count', $visit_count, time()+60*60*24,'/');

?>

<!Doctype html>
<html>
<head>
	<title>SetA2</title>
</head>
<body>
	<h1>Welcome to Website !</h1>
	<p>This pase has been accessed <?php echo"$visit_count"; ?> time in this Browser</p>
</body>
</html>