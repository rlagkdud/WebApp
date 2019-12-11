<?php
$BOOKS_FILE = "books.txt";
function filter_chars($str) {
	return preg_replace("/[^A-Za-z0-9_]*/", "", $str);
}
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}
$category = "";
$delay = 0;
if (isset($_REQUEST["category"])) {
	$category = filter_chars($_REQUEST["category"]);
}
if (isset($_REQUEST["delay"])) {
	$delay = max(0, min(60, (int) filter_chars($_REQUEST["delay"])));
}
if ($delay > 0) {
	sleep($delay);
}
if (!file_exists($BOOKS_FILE)) {
	header("HTTP/1.1 500 Server Error");
	die("ERROR 500: Server error - Unable to read input file: $BOOKS_FILE");
}
header("Content-type: application/json");
print "{\n  \"books\": [\n";
// write a code to : 
// 1. read the "books.txt"
// 2. search all the books that matches the given category 
// 3. generate the result in JSON data format 
$lines = file($BOOKS_FILE);
for ($i = 0; $i < count($lines); $i++) {
	list($title, $author, $book_category, $year, $price) = explode("|", trim($lines[$i]));
	if ($book_category == $category) {
		print "\t\t{\n";
		print "\t\t\t\"title\" : \"$title\",\n";
		print "\t\t\t\"author\" : \"$author\",\n";
		print "\t\t\t\"category\" : \"$category\",\n";
		print "\t\t\t\"year\" : $year,\n";
		print "\t\t\t\"price\" : $price\n";
		if($category == 'children'){
			if($i == count($lines)-1){
				print "\t}\n";
			} else{
				print "\t},\n";
			}
		} else if($category == 'cooking'){
			if($i == count($lines)-2){
				print "\t}\n";
			} else{
				print "\t},\n";
			}
		} else if($category == 'finance'){
			if($i == count($lines)-4){
				print "\t}\n";
			} else{
				print "\t},\n";
			}
		} else{
			if($i == count($lines)-5){
				print "\t}\n";
			} else{
				print "\t},\n";
			}
		}
	}
}
print "  ]\n}\n";
?>