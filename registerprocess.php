<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = isset($_POST["newUsername"]) ? htmlspecialchars($_POST["newUsername"]) : "";
    $newPassword = isset($_POST["newPassword"]) ? htmlspecialchars($_POST["newPassword"]) : "";

    if (!empty($newUsername) && !empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $mysqli = mysqli_connect("mi-linux", "2349472", "52t0w1", "db2349472");

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $checkUsernameQuery = "SELECT * FROM users WHERE username = '$newUsername'";
        $result = mysqli_query($mysqli, $checkUsernameQuery);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Username already exists. Please choose a different username.";
        } else {
            $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$newUsername', '$hashedPassword')";

            if (mysqli_query($mysqli, $insertUserQuery)) {
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Error registering user: " . mysqli_error($mysqli);
            }
        }

        mysqli_close($mysqli);
    } else {
        $error_message = "Please fill in all fields for registration.";
    }
}
?>
