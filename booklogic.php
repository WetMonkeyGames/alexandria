<?php
//gets the current directory name so the book can be identified by the directory name to be pulled up via a database query (useful for 
//adding a chat, etc
$dirname = dirname($_SERVER['PHP_SELF']);
$dirname = substr($dirname, 1);
echo "<br/>";
echo "Book Submitted: ";


$dt = new DateTime("@$dirname");  // convert UNIX timestamp to PHP DateTime
$timeBookSubmitted = $dt->format('Y-m-d H:i:s'); // gives output in y-m-d hour minuite second format
echo $timeBookSubmitted;
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
	echo "<br/>";
	echo "<center>";
	//prints out user info
	echo "<a href='/".$url. "'>Download ".$bookInfo["fileName"]." here</a>";
	echo "<p>Book Name: ".$bookInfo["bookName"]."</p>"; 
	echo "<p>Author Name: ".$bookInfo["authorName"]."</p>";
	echo "<p>Year Published: ".$bookInfo["yearPublished"]."</p>";
	echo "<p>Category: ".$bookInfo["category"]."</p>";	
	echo "<p>Isbn: ".$bookInfo["isbn"]."</p>";
	echo "</center>";
}

$sql = "SELECT * FROM bookComment WHERE link = '$dirname'";

$prepareStatement = $PDO->prepare($sql);

$prepareStatement->execute();

$fetchedArray = $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
echo "<table width = '45%' align = 'center' cellpadding='2' border='1'>";
foreach($fetchedArray as $comments)
{
	$timePosted = $comments['timestamp'];
	
	$dt = new DateTime("@$timePosted");  // convert UNIX timestamp to PHP DateTime
	$bookSubmitted = $dt->format('Y-m-d H:i:s'); // output = 2012-08-15 00:00:00 
	echo "<tr><td align = 'center'>Time Posted: ". $bookSubmitted ."</td></tr>";
		
	echo "<tr><td align = 'center'>Nickname: ". $comments['nickname'] ."</td></tr>";
	echo "<tr><td>Comment: <p align = 'center'>". $comments['comment'] . "</p></td></tr>";

}
echo "<tr><td>Leave a Comment</td></tr>";
echo "<form enctype = 'multipart/form-data' action = '../submitcomment.php' method = 'POST''>";

echo "<tr><td>Nickname: <input name = 'nickname' type='text' id='nickname' /></td></tr>";
echo "<tr><td>Comment: <textarea name = 'comment' type='text' id='comment' /></textarea></td></tr>";
echo "<input type = 'hidden' name = 'link' value = '". $dirname . "'>";
echo "<tr><td><input type='submit' value='Submit Comment' /></td></tr>";

echo "</form>";

echo "</table>";

echo $dirname;


?>
