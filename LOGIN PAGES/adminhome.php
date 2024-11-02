<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminhomestyles.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
                <button class="side-button" onclick="window.location.href='../ADMIN PAGES/ADD ADMIN/addadmin.php'">Add Admin</button>
                <button class="side-button" onclick="window.location.href='../ADMIN PAGES/ADMIN PASSWORD/changeadminpassword.php'">Change Password</button>
                <button class="side-button" onclick="window.location.href='../ADMIN PAGES/YOUR DETAILS/yourdetails.php'">Your Details</button>
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
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/addcustomer/addcustomer.php'">Add Customer</button>
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/editcustomer/editcustomer.php'">Edit Customer Details</button>
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/customerdelete/customerdelete.php'">Remove Customer</button>
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/customerlist/customerlist.php'">Customer List</button>
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/Billing/billingmenu.php'">Billing</button>
                <button class="main-button" onclick="window.location.href='../ADMIN PAGES/Complaints/complaints.php'">Complaints Panel</button> <!-- Update link accordingly -->
            </div>
        </div>
    </div>
</body>
</html>
