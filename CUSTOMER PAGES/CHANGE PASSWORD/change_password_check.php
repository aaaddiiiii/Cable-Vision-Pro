<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: userlogin.php"); // Redirect if not logged in
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify current password
    $sql = "SELECT * FROM userdata WHERE userid = '$username' AND user_password = '$current_password'";
    $result = mysqli_query($data, $sql);

    if (mysqli_num_rows($result) > 0) {
        if ($new_password === $confirm_password) {
            // Update the password in the database
            $update_sql = "UPDATE userdata SET user_password = '$new_password' WHERE userid = '$username'";
            if (mysqli_query($data, $update_sql)) {
                $_SESSION['changePasswordMessage'] = "Password changed successfully.";
            } else {
                $_SESSION['changePasswordMessage'] = "Error updating password. Please try again.";
            }
        } else {
            $_SESSION['changePasswordMessage'] = "New password and confirm password do not match.";
        }
    } else {
        $_SESSION['changePasswordMessage'] = "Current password is incorrect.";
    }

    header("location: changepassword.php");
    exit();
}
?>
