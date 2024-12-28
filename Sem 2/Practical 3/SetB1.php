<?php

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='ISO-8859-1'?> <CD_Store></CD_Store> ");

$datas = [
	["title"=>"Mr. India","release"=>"1987"],
	["title"=>"Holiday","release"=>"2014"],
	["title"=>"LOC","release"=>"2004"]
];

foreach($datas as $data) {
	$movie = $xml->addchild("Movie");
	$movie->addchild("Title",$data["title"]);
	$movie->addchild("Release_Year",$data["release"]);
}

$xml->asXML("Movie.xml");

echo "XML File Created as Movies.xml";

?>