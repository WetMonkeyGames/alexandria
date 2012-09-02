<?php
include "booksearch.php";

$yearPublished = $_POST['yearPublishedSearch'];
$sql = "SELECT * FROM bookCatalog WHERE yearPublished like '%$yearPublished%'";
//prepare sql statement
$prepare_statement = $PDO->prepare($sql);
//get num of rows for sql query by first executing, then getting the num rows
$prepare_statement->execute();
//get num rows
$pdo_number_of_rows_returned = $prepare_statement->rowCount();

if ($pdo_number_of_rows_returned > 0)
{
	echo "<table border cellpadding=1>";
	echo "<tr><th>File Name</th><th>Link</th><th>Book Name</th><th>Author Name</th><th>Year Published</th><th>Category</th><th>Isbn</th></tr>";	
	//puts sql into assoc_array
	$book_array = $prepare_statement->fetchAll(PDO::FETCH_ASSOC);
	//uses foreach loop to go through the array and grab each element of the array 
	//and assign it to the value of row
	foreach($book_array as $row)	
	{
		echo " <tr><td>";
		// This will loop through entire query
        echo $row['fileName'];
        echo "</td><td>";		
		echo "<a href = '/". $row['link'] . "'>" . $row['bookName'] . "</a>";
		echo "</td><td>";
		echo $row['bookName'];
		echo "</td><td>";
		echo $row['authorName'];
		echo "</td><td>";
		echo $row['yearPublished'];
		echo "</td><td>";
		echo $row['category'];
		echo "</td><td>";
		echo $row['isbn'];
		echo "</td><td>";
		echo $row['authorName'];						
		echo "</td></tr>";
	}
	echo "</table>";
}

?>
