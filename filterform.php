 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Books</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <form action="filterprocess.php" method="get">
		 <label for="searchId">Book ID:</label>
        <input type="text" id="searchId" name="searchId" placeholder="Enter book id">
        <label for="searchName">Book Name:</label>
        <input type="text" id="searchName" name="searchName" placeholder="Enter book name">
        <label for="searchAuthor">Book Author:</label>
        <input type="text" id="searchAuthor" name="searchAuthor" placeholder="Enter book author">
        <label for="searchGenre">Book Genre:</label>
        <input type="text" id="searchGenre" name="searchGenre" placeholder="Enter book genre">
        <label for="searchRating">Book Rating:</label>
        <input type="text" id="searchRating" name="searchRating" placeholder="Enter book rating">
        <label for="searchRelease">Book Release:</label>
        <input type="text" id="searchRelease" name="searchRelease" placeholder="Enter book release">
        <label for="searchPrice">Book Price:</label>
        <input type="text" id="searchPrice" name="searchPrice" placeholder="Enter book price">
        <button type="submit" name="filter">Search</button>
    </form>
	<h1> Filter Books</h1>
	<h2>
	 <p><a href="page1.php">Return to My Library</a></p>
</h2>
	 <?php
    include 'filterprocess.php';
    ?>
	
</body>
</html>