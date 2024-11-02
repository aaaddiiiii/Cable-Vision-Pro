<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
                <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/customerhome.php'">Go Back</button>
                <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Heading for Admin Dashboard -->
            <div class="heading-container">
                <h1>Complaints Dashboard</h1>
            </div>
            <div class="button-grid">
                <button class="main-button" onclick="window.location.href='new_complaints/newcomplaint.php'">New Complaint</button>
                <button class="main-button" onclick="window.location.href='prev_complaints/prevcomplaints.php'">Previous Complaints</button>
            </div>
        </div>
    </div>
</body>
</html>
