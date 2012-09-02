<?php
include "header.php";
echo "
<html>
<head>
<title>Pdf Upload</title>
</head>
<body>
<form enctype = 'multipart/form-data' action = 'pdfuploader.php' method = 'POST''>
Choose a PDF file to upload to the library: <input name = 'pdfFile' type='file' id='pdfFile' /><br/>
Book Name:<input name = 'bookName' type='text' id='bookName'><br/>
Author:<input name = 'authorName' type='text' id='authorName'><br/>
Year Published:<input name = 'yearPublished' type='text' id='yearPublished'><br/>
Category:<input name = 'category' type='text' id='category'><br/>
Isbn:<input name = 'isbn' type='text' id='isbn'><br/>
<input type='submit' value='Upload Book' />
</form>
</body>
</html>";

?>
