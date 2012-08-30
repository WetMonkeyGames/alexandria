<?php

include "header.php";

$fileName = basename($_FILES['pdfFile']['name']);
$extension = substr($fileName, strrpos($fileName, '.') + 1);
if 	(($extension == "pdf") && 
	($_FILES["pdfFile"]["type"] == "application/pdf") &&
    ($_FILES["pdfFile"]["size"] < 4550000))
    {
		
		/*
		 * creates directorybased on unix timestamp where the pdf file will be located
		 */
		 
		//create directory name based on unix timestamp
		$directoryName =  time();	
		//gives name for link in database (same as directoryName)
		$link = $directoryName;	
		//grab current directory name
		$currentDirectoryName = dirname(__file__);		
		//gives path for new Directory where the book will be stored / accessable etc
		$newDirectory = $currentDirectoryName . '/' . $directoryName;		
		//creates directory
		mkdir($newDirectory, 0755);	
		//set target path as new directory after directory is created
		$targetPath = $newDirectory . '/';		
		//sets target path as new directory with new file name for copying the file to the new directory
		$targetPath = $targetPath . basename($_FILES['pdfFile']['name']);		
		//move temporary stored file to new target path
		move_uploaded_file($_FILES['pdfFile']['tmp_name'], $targetPath);
		
		/*
		 * creates an index page in the directory so the pdf file can be found, commented on etc
		 * relies heavily on the logic contained in bookLogic.php
		 * uses a header call that includes all neccissary files to make the directory viewable
		 */
				
		//create index page for the file itself that includes chat etc		
		$bookIndex = $newDirectory . "/index.php";		
		//uses fopen to set fopen to write
		$indexWrite = fopen($bookIndex, 'w') or die("can't open file");		
		//sets the to be written text into the newly created php page
		$indexText = "<?php include 	'../header.php'; include '../booklogic.php'; ?>";		
		//writes the above data
		fwrite($indexWrite, $indexText);		
		//closes the page
		fclose($indexWrite);		
		
		/*
		 * create variables based off of given information
		 * fileName is declared earlier in file
		 */
		 
		 $bookName = $_POST['bookName'];
		 $authorName = $_POST['authorName'];
		 $yearPublished = $_POST['yearPublished'];
		 $category = $_POST['category'];
		 $isbn = $_POST['isbn'];		 
		
		/*
		 * uploads data including book name, 
		 * file location
		 * isbn
		 * author etc into database
		 */
		 
		 //sql query to add information to pdf file database
		 $sql = "INSERT INTO  `bookCatalog` (  `fileName` ,  `link` ,  `bookName` ,  `authorName` ,  `yearPublished` ,  `category` ,  `isbn` ) 
VALUES ( '$fileName', '$link', '$bookName', '$authorName', '$yearPublished', '$category', '$isbn')";
		 echo $sql;
		 
		 //prepare sql statement
		 $prepare_statement = $PDO->prepare($sql);
		 //execute prepared statement
		 $prepare_statement->execute();
		
	}
else { echo "oh noes, something went wrong" ; }
?>
