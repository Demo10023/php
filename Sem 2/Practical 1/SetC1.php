<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page1_total = 0;

    // Calculate page total
    if (isset($_POST['items'])) {
        foreach ($_POST['items'] as $price) {
            $page1_total += (int)$price;
        }
    }

    $_SESSION['page1_total'] = $page1_total;

    // Redirect to Page 2
    header("Location: SetC1b.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Mall - Page 1</title>
</head>
<body>
    <h1>Shopping Mall - Page 1</h1>
    <form method="POST">
        Shoes  $1000 : <input type="checkbox" name="items[]" value="1000"> <br><br>
        Bag    $1200 : <input type="checkbox" name="items[]" value="1200"> <br><br>
        Shirt   $600 : <input type="checkbox" name="items[]" value="600"> <br><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
