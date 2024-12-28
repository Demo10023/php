<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page2_total = 0;

    // Calculate page total
    if (isset($_POST['items'])) {
        foreach ($_POST['items'] as $price) {
            $page2_total += (int)$price;
        }
    }

    // Store page 2 total in the session
    $_SESSION['page2_total'] = $page2_total;

    // Redirect to the Bill Page
    header("Location: SetC1c.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Mall - Page 2</title>
</head>
<body>
    <h1>Shopping Mall - Page 2</h1>
    <form method="POST">
        Watch  $1500 : <input type="checkbox" name="items[]" value="1500"> <br><br>
        Hat     $500 : <input type="checkbox" name="items[]" value="500"> <br><br>
        Belt    $700 : <input type="checkbox" name="items[]" value="700"> <br><br>
        <input type="submit" value="View Bill">
    </form>
</body>
</html>
