<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session here

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Query to check username and password
    $sql = "SELECT * FROM userdata WHERE userid = '$name' AND user_password = '$pass'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row["usertype"] == "admin") {
            $_SESSION['username'] = $name; // Store username in session
            header("location: adminhome.php");
            exit(); // Exit after the redirect
        } else {
            $_SESSION['loginMessage'] = "Username or Password INCORRECT!";
            header("location: adminlogin.php"); // Redirect back to login page
            exit();
        }
    } else {
        $_SESSION['loginMessage'] = "Username or Password INCORRECT!";
        header("location: adminlogin.php"); // Redirect back to login page
        exit();
    }
}
?>
