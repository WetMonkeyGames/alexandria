<?php
include "header.php";
/*
 * used to search by different criteria ae author name, filename, isbn etc
 */
echo '<form id="fileSearch" method="post" action="filenamesearch.php">
Search by file name: <input type="text" size="10" maxlength="40" name="fileNameSearch">
<input type="submit" value="Go">';
echo '<br/>';


echo '<form id="game_search" method="post" action="booknamesearch.php">
Search by book name: <input type="text" size="10" maxlength="40" name="bookNameSearch">
<input type="submit" value="Go">';
echo '<br/>';


echo '<form id="game_search" method="post" action="authornamesearch.php">
Search by author name: <input type="text" size="10" maxlength="40" name="authorNameSearch">
<input type="submit" value="Go">';
echo '<br/>';

echo '<form id="game_search" method="post" action="yearpublishedsearch.php">
Search by year published: <input type="text" size="10" maxlength="40" name="yearPublishedSearch">
<input type="submit" value="Go">';
echo '<br/>';


echo '<form id="game_search" method="post" action="categorysearch.php">
Search by category: <input type="text" size="10" maxlength="40" name="categorySearch">
<input type="submit" value="Go">';
echo '<br/>';


echo '<form id="game_search" method="post" action="isbnsearch.php">
Search by isbn: <input type="text" size="10" maxlength="40" name="isbnSearch">
<input type="submit" value="Go">';
echo '<br/>';

?>
