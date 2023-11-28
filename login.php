<?php
session_start();

include 'loginprocess.php';

$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<h1>Log In to your Account</h1>

<?php
if ($isLoggedIn) {
    header("Location: welcome.php");
    exit();
} else {
    include 'loginform.html';
    if (isset($error_message)) {
        echo '<div class="error-message">' . $error_message . '</div>';
    }
}
?>

</body>
</html>
