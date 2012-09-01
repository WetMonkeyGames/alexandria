<?php
include 'header.php';
$nickname = $_POST['nickname'];
$comment = $_POST['comment'];
$link = $_POST['link'];
$timestamp = time();

$sql = "INSERT INTO bookComment (nickname, comment, link, timestamp) VALUES ( '$nickname' , '$comment', '$link' , '$timestamp' )";
echo $sql;
//prepare sql statement
$prepare_statement = $PDO->prepare($sql);
//execute statement for pdo
if($prepare_statement->execute())
{
	echo "comment successfully submitted";
	echo "<a href='".$link."'>Go back</a>";
}
else
{
	echo "oh dear, something went terribly wrong, please try again";
}
