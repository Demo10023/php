<?php

$style = $_COOKIE['font_style'];
$size = $_COOKIE['font_size'];
$color = $_COOKIE['font_color'];
$bgcolor = $_COOKIE['bgcolor'];

?>

<!Doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SET B1b</title>
	<style>
		body {
			font-family: <?php echo htmlspecialchars($style); ?>;
			font-size: <?php echo htmlspecialchars($size); ?>;
			color: <?php echo htmlspecialchars($color); ?>;
			background-color: <?php echo htmlspecialchars($bgcolor); ?>;
		}
	</style>
</head>
<body>
	<h1>Preferneces Are Applied</h1>
	<p>Hello Shubham</p>
</body>
</html>