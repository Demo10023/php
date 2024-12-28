<?php

$xml = simplexml_load_file("Course.xml") or die("Error: Cannot Load XML File");

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Details</title>
	<link rel="stylesheet" href="SetA2.css">
</head>
<body>
	<h1>Student Detail's</h1>

	<table border="1">
		<tr>
			<th>Student Name</th>
			<th>Class Name</th>
			<th>Percentage</th>
		</tr>
		
		<?php foreach ($xml->Computer_Science as $student): ?>
		<tr>
			<td class="name"><?php echo $student->Student_name; ?></td>
			<td class="class"><?php echo $student->Class_name; ?></td>
			<td class="percentage"><?php echo $student->Percentage; ?></td>
		</tr>
	<?php endforeach; ?>

	</table>


</body>
</html>