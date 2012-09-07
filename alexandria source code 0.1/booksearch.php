<?php
include "header.php";
/*
 * used to search by different criteria ae author name, filename, isbn etc
 */
echo '<form id="bookSearch" method="post" action="booksearched.php">';
echo 'Search by file name: <input type="text" size="10" maxlength="40" name="fileNameSearch">';
echo '<br/>';
echo 'Search by book name: <input type="text" size="10" maxlength="40" name="bookNameSearch">';
echo '<br/>';
echo 'Search by author name: <input type="text" size="10" maxlength="40" name="authorNameSearch">';
echo '<br/>';
echo 'Search by year published: <input type="text" size="10" maxlength="40" name="yearPublishedSearch">';
echo '<br/>';
echo 'Search by category: <input type="text" size="10" maxlength="40" name="categorySearch">';
echo '<br/>';
echo 'Search by isbn: <input type="text" size="10" maxlength="40" name="isbnSearch">';
echo '<br/>';
echo '<input type="submit" value="Search">';
echo '<br/>';

?>
