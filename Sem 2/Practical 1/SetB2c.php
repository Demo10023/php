<?php

session_start();

$total = $_SESSION['maths']+$_SESSION['physics']+$_SESSION['biology']+$_SESSION['chemistry']+$_SESSION['marathi']+$_SESSION['english'];

$per = $total/6;

echo "<h2>Student Information</h2>";

echo "<b><big>Name       : ".$_SESSION['name']."</big></b><br><br>";
echo "<b><big>Class      : ".$_SESSION['class']."</big></b><br><br>";
echo "<b><big>Address    : ".$_SESSION['address']."</big></b><br><br>";
echo "<b><big>Physics    : ".$_SESSION['physics']."</big></b><br><br>";
echo "<b><big>Biology    : ".$_SESSION['maths']."</big></b><br><br>";
echo "<b><big>Chemistry  : ".$_SESSION['chemistry']."</big></b><br><br>";
echo "<b><big>Maths      : ".$_SESSION['maths']."</big></b><br><br>";
echo "<b><big>Marathi    : ".$_SESSION['marathi']."</big></b><br><br>";
echo "<b><big>English    : ".$_SESSION['english']."</big></b><br><br>";
echo "<b><big>Total      : ".$total."</big></b><br><br>";
echo "<b><big>Percentage : ".$per."</big></b><br><br>";
?>