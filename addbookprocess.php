<?php
$mysqli = mysqli_connect("mi-linux", "2349472", "52t0w1", "db2349472");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$popupMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookName = isset($_POST["bookName"]) ? htmlspecialchars($_POST["bookName"]) : "";
    $bookAuthor = isset($_POST["bookAuthor"]) ? htmlspecialchars($_POST["bookAuthor"]) : "";
    $bookGenre = isset($_POST["bookGenre"]) ? htmlspecialchars($_POST["bookGenre"]) : "";
    $bookRating = isset($_POST["bookRating"]) ? htmlspecialchars($_POST["bookRating"]) : "";
    $bookRelease = isset($_POST["bookRelease"]) ? htmlspecialchars($_POST["bookRelease"]) : "";
    $bookPrice = isset($_POST["bookPrice"]) ? htmlspecialchars($_POST["bookPrice"]) : "";

    $insertQuery = "INSERT INTO Books (bookName, bookAuthor, bookGenre, bookRating, bookRelease, bookPrice) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssssss", $bookName, $bookAuthor, $bookGenre, $bookRating, $bookRelease, $bookPrice);
    $stmt->execute();
    $stmt->close();

    $popupMessage = "Book '$bookName' has been added to the library!";
}


$mysqli->close();
?>
