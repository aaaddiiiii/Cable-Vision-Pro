<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    header("location: userlogin.php");
    exit();
}

$userid = $_SESSION['userid'];

// Fetch logged-in user's details
$query = "SELECT user_name, email, pno, addr FROM userdata WHERE userid='$userid'";
$result = $data->query($query);
$user_data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            <h1>Edit Profile</h1>

            <!-- Edit profile form -->
            <form action="submit_edit_profile.php" method="POST" class="customer-form">
                <input type="hidden" name="userid" value="<?= $userid; ?>">

                <div class="input-container">
                    <div class="left-container">
                        <label for="customer-name">Customer Name :</label>
                        <input type="text" id="customer-name" name="customer_name" value="<?= $user_data['user_name']; ?>" required>

                        <label for="customer-email">Email :</label>
                        <input type="email" id="customer-email" name="customer_email" value="<?= $user_data['email']; ?>" required>

                        <label for="customer-phone">Phone Number :</label>
                        <input type="text" id="customer-phone" name="customer_phone" value="<?= $user_data['pno']; ?>" required>

                        <label for="customer-address">Address :</label>
                        <textarea id="customer-address" name="customer_address" required><?= $user_data['addr']; ?></textarea>
                    </div>
                </div>

                <div class="submit-container">
                    <button type="submit" class="submit-button" name="update">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
