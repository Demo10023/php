<?php
session_start();
session_unset();
session_destroy();
header("Location: SetA1.php?message=You have successfully logged out.");
exit();
?>