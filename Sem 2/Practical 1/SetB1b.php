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
</head>
<body>
	<h1>Your Selected Preferences</h1>
	<p><strong>Font Style : </strong><?php echo htmlspecialchars($style);?></p>
	<p><strong>Font Size  : </strong><?php echo htmlspecialchars($size);?></p>
	<p><strong>Color      : </strong><?php echo htmlspecialchars($color);?></p>
	<p><strong>Background : </strong><?php echo htmlspecialchars($bgcolor);?></p>

	<form method="post">
		<input type="submit" name="apply" name="APPLY">
	</form>

</body>
</html>

<?php

if(isset($_POST['apply'])) {

	header("Location: SetB1c.php");
}

?>