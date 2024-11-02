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
    <title>Add Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Add Admin</h1>
            <form action="submit_admin.php" method="POST" class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <label for="admin-name">Admin Name :</label>
                        <input type="text" id="admin-name" name="admin_name" required>

                        <label for="admin-email">Admin Email :</label>
                        <input type="email" id="admin-email" name="admin_email" required>

                        <label for="admin-password">Admin Password :</label>
                        <input type="text" id="admin-password" name="admin_password" required>
                    </div>

                    <div class="right-container">
                        <label for="admin-id">Admin ID :</label>
                        <input type="text" id="admin-id" name="admin_id" required>

                        <label for="admin-phone">Phone No :</label>
                        <input type="text" id="admin-phone" name="admin_phone" required>
                    </div>
                </div>

                <div class="submit-container">
                    <button type="submit" class="submit-button" name="apply">Add Admin</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
