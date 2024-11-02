<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: adminlogin.php"); // Redirect if not logged in
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

// Fetch user details from database
$username = $_SESSION['username'];
$sql = "SELECT * FROM userdata WHERE userid = '$username'";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            <button class="side-button" onclick="window.location.href='../ADMIN PASSWORD/changeadminpassword.php'">Change Password</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Your Details</h1>
            <div class="details-container">
                <div class="detail-item">
                    <label>User ID:</label>
                    <input type="text" value="<?php echo $row['userid']; ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Name:</label>
                    <input type="text" value="<?php echo $row['user_name']; ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Email:</label>
                    <input type="email" value="<?php echo $row['email']; ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Phone Number:</label>
                    <input type="text" value="<?php echo $row['pno']; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
