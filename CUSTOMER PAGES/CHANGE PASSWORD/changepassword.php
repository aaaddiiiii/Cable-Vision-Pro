<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: userlogin.php"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
            <h1>Change Password</h1>
            <form action="change_password_check.php" method="POST" class="password-change-form">
                <div class="detail-item">
                    <label>Current Password:</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="detail-item">
                    <label>New Password:</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="detail-item">
                    <label>Confirm New Password:</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <div class="submit-container">
                    <input type="submit" class="submit-button" value="Change Password">
                </div>
                <h4 class="error-message">
                    <?php
                        if (isset($_SESSION['changePasswordMessage'])) {
                            echo $_SESSION['changePasswordMessage'];
                            unset($_SESSION['changePasswordMessage']); // Clear message after displaying it
                        }
                    ?>
                </h4>
            </form>
        </div>
    </div>
</body>
</html>
