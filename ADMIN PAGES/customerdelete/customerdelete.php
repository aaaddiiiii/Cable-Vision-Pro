<?php

error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT userid, user_name, pno, email, addr, plan, plan_activation FROM userdata WHERE usertype = 'customer'";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($data));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
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
            <?php 
                if (isset($_SESSION['message'])) {
                    echo "<div style='color: green; padding-bottom: 20px;'>" . $_SESSION['message'] . "</div>";
                }
                unset($_SESSION['message']);
            ?>

            <table border="2px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">User ID</th>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Phone No.</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Address</th>
                    <th style="padding: 20px; font-size: 15px;">Activation</th>
                    <th style="padding: 20px; font-size: 15px; color: red;">DELETE</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['userid']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['user_name']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['pno']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['email']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['addr']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px;">
                        <?php echo $info['plan_activation']; ?>
                    </td>
                    <td style="padding: 20px; font-size: 15px; color: red;">
                        <?php echo "<a onClick=\"javascript:return confirm('Are you sure?')\" href='delete.php?userid={$info['userid']}'>Delete</a>"; ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
