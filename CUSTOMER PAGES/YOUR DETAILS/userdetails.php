<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Ensure user is logged in
if (!isset($_SESSION['userid'])) {
    header("location: userlogin.php");
    exit();
}

$userid = $_SESSION['userid'];
$query = "SELECT * FROM userdata WHERE userid='$userid'";
$result = $data->query($query);

if ($result && $result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
                <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/customerhome.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>User Details</h1>

            <!-- Display user details -->
            <form class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <label for="user-name">Customer Name :</label>
                        <input type="text" id="user-name" value="<?= $user_data['user_name']; ?>" readonly>

                        <label for="user-email">Email :</label>
                        <input type="email" id="user-email" value="<?= $user_data['email']; ?>" readonly>

                        <label for="user-phone">Phone Number :</label>
                        <input type="text" id="user-phone" value="<?= $user_data['pno']; ?>" readonly>

                        <label for="user-address">Address :</label>
                        <textarea id="user-address" readonly><?= $user_data['addr']; ?></textarea>
                    </div>

                    <div class="right-container">
                        <label for="user-id">User ID :</label>
                        <input type="text" id="user-id" value="<?= $user_data['userid']; ?>" readonly>

                        <label for="user-plan">Plan :</label>
                        <input type="text" id="user-plan" value="<?= $user_data['plan']; ?>" readonly>

                        <label for="activation">Activation :</label>
                        <input type="text" id="activation" value="<?= $user_data['plan_activation']; ?>" readonly>

                        <label for="user-password">Password :</label>
<input type="text" id="user-password" value="<?= $user_data['user_password']; ?>" readonly>

                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
