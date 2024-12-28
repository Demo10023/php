<?php

$xml = simplexml_load_file("book.xml") or die("Error: Cannot create object");


echo "<h1>Bookstore</h1>";
echo "<ul>";

foreach($xml->book as $book) {
	echo "<li>";
	echo "<strong>Title:</strong> ". $book->title. "<br>";
	echo "<strong>Author:</strong> ". $book->author. "<br>";
	echo "<strong>Year:</strong> ". $book->year. "<br>";
	echo "<strong>Price:</strong> ". $book->price. "<br><br>";
}

echo "</ul>";

?>