<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
 <?php
    include 'addbookprocess.php';
    ?>

    <h1>Add Book</h1>

    <form method="post" action="addbookprocess.php">
        <label for="bookName">Book Name:</label>
        <input type="text" id="bookName" name="bookName" required>

        <label for="bookAuthor">Book Author:</label>
        <input type="text" id="bookAuthor" name="bookAuthor" required>

        <label for="bookGenre">Book Genre:</label>
        <input type="text" id="bookGenre" name="bookGenre" required>

        <label for="bookRating">Book Rating:</label>
        <input type="text" id="bookRating" name="bookRating" required>

        <label for="bookRelease">Book Release:</label>
        <input type="text" id="bookRelease" name="bookRelease" required>

        <label for="bookPrice">Book Price:</label>
        <input type="text" id="bookPrice" name="bookPrice" required>

        <button type="submit">Add Book</button>
		
    </form>
	 <div class="popup <?php echo $popupMessage ? 'show-popup' : ''; ?>">
        <?php echo $popupMessage; ?>
    </div>
<h2>
    <p><a href="page1.php">Go back to My Library</a></p>
</h2>

</body>
</html>