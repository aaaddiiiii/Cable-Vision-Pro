<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="customerhomestyles.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../CUSTOMER PAGES/CHANGE PASSWORD/changepassword.php'">Change Password</button>
                <button class="side-button" onclick="window.location.href='../CUSTOMER PAGES/YOUR DETAILS/userdetails.php'">Your Details</button>
                <button class="side-button logout" onclick="window.location.href='../index.php'">LOG OUT</button>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Heading for Admin Dashboard -->
            <div class="heading-container">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="button-grid">
                <button class="main-button" onclick="window.location.href='../CUSTOMER PAGES/PAYMENT/bill_list.php'">Bill Payment</button>
                <button class="main-button" onclick="window.location.href='../CUSTOMER PAGES/complaints/complaints_menu.php'">Complaint Panel</button>
                <button class="main-button" onclick="window.location.href='../CUSTOMER PAGES/editprofile/editprofile.php'">Profile Management</button>
            </div>
        </div>
    </div>
</body>
</html>
