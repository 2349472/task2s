<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Library</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <h1>Your Library</h1>

    <h2>
        <p><a href="addbook.php">Add a book</a> <a href="filterform.html">Filter books</a> <a href="page2.php">Log Out</a></p>
    </h2>

    <form id="searchForm">
        <label for="search">Find:</label>
        <input type="text" id="search" name="search" placeholder="Enter Book Information" oninput="searchBooks()">
    </form>

    <table id="booksTable" border="2">

 <?php
    $originalTableContent ='';

    while ($row = $result->fetch_assoc()) {
        $originalTableContent .= '<tr>
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

   <script>
    var originalTableContent = '<?php echo $originalTableContent; ?>';

    document.getElementById('booksTable').innerHTML = originalTableContent;

    function searchBooks() {
        var searchTerm = document.getElementById('search').value;

        if (searchTerm === '') {
            document.getElementById('booksTable').innerHTML = originalTableContent;
            return;
        }

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var books = JSON.parse(this.responseText);
                updateTable(books);
            }
        };

        xhttp.open("GET", "page1process.php?search=" + searchTerm, true);
        xhttp.send();
    }

    function updateTable(books) {
        var tableContent = '<tr><th>Book ID</th><th>Book Name</th><th>Book Author</th><th>Book Genre</th><th>Book Rating</th><th>Book Release</th><th>Book Price</th><th>Action</th></tr>';

        for (var i = 0; i < books.length; i++) {
            tableContent += '<tr>';
            tableContent += '<td>' + books[i].bookId + '</td>';
            tableContent += '<td>' + books[i].bookName + '</td>';
            tableContent += '<td>' + books[i].bookAuthor + '</td>';
            tableContent += '<td>' + books[i].bookGenre + '</td>';
            tableContent += '<td>' + books[i].bookRating + '</td>';
            tableContent += '<td>' + books[i].bookRelease + '</td>';
            tableContent += '<td>' + books[i].bookPrice + '</td>';
            tableContent += '<td><a href="deletebookprocess.php?id=' + books[i].bookId + '" onclick="return confirm(\'Are you sure you want to delete this book?\')">Delete</a></td>';
            tableContent += '</tr>';
        }

        document.getElementById('booksTable').innerHTML = tableContent;
    }
</script>
</body>
</html>
