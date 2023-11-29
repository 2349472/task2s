<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$mysqli = mysqli_connect("mi-linux", "2349472", "52t0w1", "db2349472");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_GET['search'])) {
    $searchTerm = '%' . $_GET['search'] . '%';

    $query = "SELECT bookId, bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice 
              FROM Books 
              WHERE bookName LIKE ? OR 
                    bookAuthor LIKE ? OR 
                    bookGenre LIKE ? OR 
                    bookRating LIKE ? OR 
                    bookRelease LIKE ? OR 
                    bookPrice LIKE ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
} else {
    $query = "SELECT bookId, bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice 
              FROM Books";
    
    $stmt = $mysqli->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

if (isset($_GET['search'])) {
    // Display JSON only if it's a search request
    echo json_encode($books);
} else {
    // Display the table only if it's not a search request
    include('page1form.php');
}

$mysqli->close();
?>
