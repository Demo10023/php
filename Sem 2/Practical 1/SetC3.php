<?php
// Check if the count cookie is set
if (!isset($_COOKIE['count'])) {
    // Set the initial login attempt count to 0 if not set
    setcookie('count', 0, time() + 60 * 60, '/');  // Cookie expires in 1 hour
    $_COOKIE['count'] = 0; // Set the cookie count in the current request to 0
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SET C3</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="post">
        Username: <input type="text" name="uname" required><br><br>
        Password: <input type="password" name="pass" required><br><br>
        <input type="submit" name="login" value="LOGIN"><br><br>
    </form>
</body>
</html>

<?php
// Handle login logic when the form is submitted
if (isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // If the count reaches 3, redirect to SetC3c.php
    if ((int)$_COOKIE['count'] >= 3) {
        header("Location: SetC3c.php");
        exit();
    }

    // Check username and password
    if ($uname === "shubham" && $pass === "pass") {
    	setcookie('count', 0, time() + 60 * 60, '/');
        header("Location: SetC3b.php");
        exit();
    } else {
        // If login fails, redirect to the same page for another attempt

    $count = (int) $_COOKIE['count'] + 1;
    setcookie('count', $count, time() + 60 * 60, '/'); 
    $_COOKIE['count'] = $count; 
        header("Location: SetC3.php");
        exit();
    }
}

?>
