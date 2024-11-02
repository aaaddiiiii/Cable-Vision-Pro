<?php
session_start();

// Database connection
$servername = "localhost"; // Hostname
$username = "root"; // MySQL username
$password = ""; // MySQL password (default is blank for XAMPP)
$dbname = "cableconnection"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch customer data with usertype 'customer'
$sql = "SELECT userid, user_name, pno, email, addr, plan, plan_activation FROM userdata WHERE usertype = 'customer'";
$result = $conn->query($sql);
?>

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
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Customer List</h1>

            <table border="2px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">User ID</th>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Phone No.</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Address</th>
                    <th style="padding: 20px; font-size: 15px;">Plan</th>
                    <th style="padding: 20px; font-size: 15px;">Activation</th>
                </tr>

                <!-- PHP Loop -->
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($info = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='padding: 20px; font-size: 15px;'>{$info['userid']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['user_name']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['pno']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['email']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['addr']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['plan']}</td>
                                <td style='padding: 20px; font-size: 15px;'>{$info['plan_activation']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='padding: 20px; font-size: 15px;'>No customers found</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>
