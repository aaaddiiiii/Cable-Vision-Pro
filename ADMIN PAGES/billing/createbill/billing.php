<?php
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['message']); // Clear the message after displaying
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bill for All Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../billingmenu.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Create Bills for All Customers</h1>
            <form action="create_bill.php" method="POST" class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <!-- New Bill Receiver Dropdown -->
                        <label for="bill_receiver">Bill Receiver:</label>
                        <select id="bill_receiver" name="bill_receiver" required>
                            <option value="all">All Customers</option>
                            <option value="normal">Normal Customers</option>
                            <option value="hd">HD Customers</option>
                        </select>

                        <label for="due_date">Due Date:</label>
                        <input type="date" id="due_date" name="due_date" required>

                        <label for="amount">Amount:</label>
                        <input type="number" step="0.01" id="amount" name="amount" required>
                    </div>

                    <div class="right-container">
                        <!-- Optional: Additional fields can be added here -->
                    </div>
                </div>
                <div class="submit-container">
                    <button type="submit" class="submit-button" name="apply">Create Bills</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
