<?php
//gets the current directory name so the book can be identified by the directory name to be pulled up via a database query (useful for 
//adding a chat, etc
$dirname = dirname($_SERVER['PHP_SELF']);
$dirname = substr($dirname, 1);
echo "<br/>";
echo $dirname;
echo "<br/>";
$sql = "SELECT * FROM bookCatalog WHERE link = '$dirname'";

//prepare sql statement
$prepare_statement = $PDO->prepare($sql);
//get num of rows for sql query by first executing, then getting the num rows
$prepare_statement->execute();
//get the user's infor and put it into an associative array
$fetched_array = $prepare_statement->fetchAll(PDO::FETCH_ASSOC);
foreach($fetched_array as $bookInfo);
{
	$fileName = $bookInfo['fileName'];
	$url = $dirname . '/' . $fileName;
	echo $url;
	echo "<br/>";
		
	//prints out user info
	echo "<a href='/".$url. "'>".$bookInfo["fileName"]."</a>";
	echo "<p>Book Name: ".$bookInfo["bookName"]."</p>"; 
	echo "<p>Author Name: ".$bookInfo["authorName"]."</p>";
	echo "<p>Year Published: ".$bookInfo["yearPublished"]."</p>";
	echo "<p>Category: ".$bookInfo["category"]."</p>";	
	echo "<p>Isbn: ".$bookInfo["isbn"]."</p>";
	
}

$sql = "SELECT * FROM bookComment WHERE link = '$dirname'";

$prepareStatement = $PDO->prepare($sql);

$prepareStatement->execute();

$fetchedArray = $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
echo "<table width = '45%' align = 'center' cellpadding='2' border='2'>";
foreach($fetchedArray as $comments)
{
	echo "<tr><td>". $comments['nickname'] ."</td></tr>";
	echo "<tr><td>". $comments['comment'] . "</td></tr>";

}
echo "</table>";



?>
