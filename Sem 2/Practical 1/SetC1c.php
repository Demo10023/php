<?php
session_start();

// Retrieve page totals from the session
$page1_total = isset($_SESSION['page1_total']) ? $_SESSION['page1_total'] : 0;
$page2_total = isset($_SESSION['page2_total']) ? $_SESSION['page2_total'] : 0;

// Calculate the grand total
$grand_total = $page1_total + $page2_total;

// Clear session data (optional)
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Mall - Bill</title>
</head>
<body>
    <h1>Shopping Mall - Bill</h1>
    <p>Page 1 Total: $<?php echo $page1_total; ?></p>
    <p>Page 2 Total: $<?php echo $page2_total; ?></p>
    <hr>
    <h2>Grand Total: $<?php echo $grand_total; ?></h2>
</body>
</html>
