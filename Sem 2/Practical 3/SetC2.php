<?php

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' ?> <cricket_team></cricket_team>");

//adding indian team
$india = $xml->addchild("Country");
$india->addAttribute('name','India');

//adding players for india 
$player1 =  $india->addchild("Player");
$player1->addchild("Name","Rohit Sharma");
$player1->addchild("Wickets","0");
$player1->addchild("Runs","9000");

$player2 =  $india->addchild("Player");
$player2->addchild("Name","Virat Kohli");
$player2->addchild("Wickets","0");
$player2->addchild("Runs","12000");

//adding England Team
$england = $xml->addchild("Country");
$england->addAttribute("name","England");

$player1 =  $england->addchild("Player");
$player1->addchild("Name","Joe Root");
$player1->addchild("Wickets","0");
$player1->addchild("Runs","8000");

$player2 =  $england->addchild("Player");
$player2->addchild("Name","Ben Stokes");
$player2->addchild("Wickets","250");
$player2->addchild("Runs","6000");

$xml->asXML("cricket.xml");

echo "cricket.xml is created !";




?>