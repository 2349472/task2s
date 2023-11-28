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
                    bookPrice LIKE ?
              LIMIT 8";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
} else {
    $query = "SELECT bookId, bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice 
              FROM Books 
              LIMIT 8";
    
    $stmt = $mysqli->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);

$mysqli->close();
?>
