<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
    $inputPassword = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "";

    // Connecting to the database
    $mysqli = new mysqli("mi-linux", "2349472", "52t0w1", "db2349472");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->bind_result($username, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($username && password_verify($inputPassword, $hashedPassword)) {
        $_SESSION['username'] = $username;

        if (isset($_POST["remember"])) {
            setcookie("remember_username", $username, time() + (7 * 24 * 3600), "/");
            setcookie("remember_password", $inputPassword, time() + (7 * 24 * 3600), "/");
        }

        header("Location: welcome.php");
        exit();
    } else {
        $error_message = "Invalid username or password. Please try again.";
    }

    $mysqli->close();
}
?>
