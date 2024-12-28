<?php

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?> <Mayanagari_CD_Store></Mayanagari_CD_Store>");

$classics = [
	["name" => "RRR", "release" => "2021"],
	["name" => "Tamasha", "release" => "2016"]
];

$horrors = [
	["name" => "Kanchna", "release" => "2015"]
];

$actions = [
	["name" => "KGF", "release" => "2021"],
    ["name" => "Pushpa", "release" => "2020"]
];

$cls = $xml->addchild("Classic");
foreach($classics as $classic) {
	$movie = $cls->addchild("Movie");
	$movie->addchild("Movie_Name",$classic["name"]);
	$movie->addchild("Release_Year", $classic["release"]);
}

$hrr = $xml->addchild("Horror");
foreach($horrors as $horror) {
	$movie = $hrr->addchild("Movie");
	$movie->addchild("Movie_Name",$horror["name"]);
	$movie->addchild("Release_Year", $horror["release"]);
}

$act = $xml->addchild("Action");
foreach($actions as $action) {
	$movie = $act->addchild("Movie");
	$movie->addchild("Movie_Name",$action["name"]);
	$movie->addchild("Release_Year", $action["release"]);
}

$xml->asXML("B2_Movies.xml");

echo "File Created B2_Movies.xml";

?>