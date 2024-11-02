<?php
error_reporting(0);
session_start();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
            alert('$message');
          </script>";
    unset($_SESSION['message']); // Clear message after displaying
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Admin Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            </div>
            <button class="side-button logout">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Change Admin Password</h1>
            <form action="submitnewpassword.php" method="POST" class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <label for="user-id">User ID :</label>
                        <input type="text" id="user-id" name="user_id" required>
                    </div>

                    <div class="right-container">
                        <label for="new-password">NEW PASSWORD :</label>
                        <input type="password" id="new-password" name="new_password" required>
                    </div>
                </div>

                <div class="submit-container">
                    <button type="submit" class="submit-button" name="apply">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
