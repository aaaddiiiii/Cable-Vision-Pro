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
    <title>Add Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Add Customer</h1>
            <form action="submit_customer.php" method="POST" class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <label for="customer-name">Customer Name :</label>
                        <input type="text" id="customer-name" name="customer_name" required>

                        <label for="customer-email">Email :</label>
                        <input type="email" id="customer-email" name="customer_email" required>

                        <label for="customer-phone">Phone Number :</label>
                        <input type="text" id="customer-phone" name="customer_phone" required>

                        <label for="customer-address">Address :</label>
                        <textarea id="customer-address" name="customer_address" required></textarea>
                    </div>

                    <div class="right-container">
                        <label for="user-id">User ID :</label>
                        <input type="text" id="user-id" name="user_id" required>

                        <label for="customer-plan">Plan :</label>
                        <select id="customer-plan" name="customer_plan" required>
                            <option value="Normal">Normal</option>
                            <option value="HD">HD</option>
                        </select>

                        <label for="activation">Activation :</label>
                        <select id="activation" name="plan_activation" required>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>

                        <label for="password">Password :</label>
                        <input type="password" id="password" name="user_password" required>
                    </div>
                </div>
                <div class="submit-container">
                    <button type="submit" class="submit-button" name="apply">Add Customer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>