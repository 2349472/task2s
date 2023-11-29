<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$mysqli = mysqli_connect("mi-linux", "2349472", "52t0w1", "db2349472");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$recordsPerPage = 8;
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($current_page - 1) * $recordsPerPage;

$searchTermId = '';
$searchTermName = '';
$searchTermAuthor = '';
$searchTermGenre = '';
$searchTermRating = '';
$searchTermRelease = '';
$searchTermPrice = '';

if (isset($_GET['filter'])) {
    $searchTermId = '%' . $_GET['searchId'] . '%';
    $searchTermName = '%' . $_GET['searchName'] . '%';
    $searchTermAuthor = '%' . $_GET['searchAuthor'] . '%';
    $searchTermGenre = '%' . $_GET['searchGenre'] . '%';
    $searchTermRating = '%' . $_GET['searchRating'] . '%';
    $searchTermRelease = '%' . $_GET['searchRelease'] . '%';
    $searchTermPrice = '%' . $_GET['searchPrice'] . '%';

    $query = "SELECT bookId, bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice 
              FROM Books 
              WHERE bookId LIKE ? AND 
                    bookName LIKE ? AND 
                    bookAuthor LIKE ? AND 
                    bookGenre LIKE ? AND 
                    bookRating LIKE ? AND 
                    bookRelease LIKE ? AND 
                    bookPrice LIKE ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssssss', $searchTermId, $searchTermName, $searchTermAuthor, $searchTermGenre, $searchTermRating, $searchTermRelease, $searchTermPrice);
} else {
    $query = "SELECT bookId, bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice 
              FROM Books";
    
    $stmt = $mysqli->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Books</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<h1>Results</h1>

<table border="2">
    <tr>
        <th>Book ID</th>
        <th>Book Name</th>
        <th>Book Author</th>
        <th>Book Genre</th>
        <th>Book Rating</th>
        <th>Book Release</th>
        <th>Book Price</th>
        <th>Action</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['bookId'] . '</td>
                <td>' . $row['bookName'] . '</td>
                <td>' . $row['bookAuthor'] . '</td>
                <td>' . $row['bookGenre'] . '</td>
                <td>' . $row['bookRating'] . '</td>
                <td>' . $row['bookRelease'] . '</td>
                <td>' . $row['bookPrice'] . '</td>
                <td>
                    <a href="deletebookprocess.php?id=' . $row['bookId'] . '" onclick="return confirm(\'Are you sure you want to delete this book?\')">Delete</a>
                </td>
            </tr>';
    }
    ?>
</table>

<h2>
    <p><a href="page1.php">Return to My Library</a>
    <a href="filterform.html">Filter again</a></p>
</h2>
</body>
</html>
