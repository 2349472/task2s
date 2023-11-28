<?php
// Start the session
session_start();
include 'registerprocess.php';

if (isset($error_message)) {
    echo '<div class="error-message">' . $error_message . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for an Account</title>
    <link rel="stylesheet" href="page1style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<h1>Register for an Account</h1>

<?php include 'registerform.html'; ?>

</body>
</html>
