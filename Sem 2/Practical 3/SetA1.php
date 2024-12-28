<?php

$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><course></course>");

$students = [
    ["name" => "Shubham Bhosale", "class" => "TyBSc", "percentage" => "85"],
    ["name" => "BBB", "class" => "TyBSc", "percentage" => "75"],
    ["name" => "CCC", "class" => "TyBSc", "percentage" => "65"],
    ["name" => "DDD", "class" => "TyBSc", "percentage" => "95"],
    ["name" => "EEE", "class" => "TyBSc", "percentage" => "45"] 
];

foreach($students as $student) {
    $cs = $xml->addchild("computer_science");
    $cs->addchild("name",$student["name"]);
    $cs->addchild("class",$student["class"]);
    $cs->addchild("percentage",$student["percentage"]);
}

$xml->asXML("course2.xml");

echo "XML file Created Course2.xml";

?>