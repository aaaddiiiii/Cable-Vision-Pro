<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

$result = $data->query("SELECT userid, user_name FROM userdata WHERE usertype='customer'");

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $customer_query = "SELECT * FROM userdata WHERE userid='$userid'";
    $customer_result = $data->query($customer_query);
    $customer_data = $customer_result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <div class="main-content">
            <h1>Edit Customer</h1>
            
            <form method="GET" action="editcustomer.php" class="customer-list">
                <label for="customer-select">Select Customer to Edit:</label>
                <select name="userid" id="customer-select" onchange="this.form.submit()">
                    <option value="">-- Select Customer --</option>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <option value="<?= $row['userid']; ?>" <?= (isset($customer_data) && $customer_data['userid'] === $row['userid']) ? 'selected' : ''; ?>>
                            <?= $row['user_name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </form>

            <?php if (isset($customer_data)): ?>
            <form action="submit_edit_customer.php" method="POST" class="customer-form">
                <input type="hidden" name="userid" value="<?= $customer_data['userid']; ?>">

                <div class="input-container">
                    <div class="left-container">
                        <label for="customer-name">Customer Name :</label>
                        <input type="text" id="customer-name" name="customer_name" value="<?= $customer_data['user_name']; ?>" required>

                        <label for="customer-email">Email :</label>
                        <input type="email" id="customer-email" name="customer_email" value="<?= $customer_data['email']; ?>" required>

                        <label for="customer-phone">Phone Number :</label>
                        <input type="text" id="customer-phone" name="customer_phone" value="<?= $customer_data['pno']; ?>" required>

                        <label for="customer-address">Address :</label>
                        <textarea id="customer-address" name="customer_address" required><?= $customer_data['addr']; ?></textarea>
                    </div>

                    <div class="right-container">
                        <label for="user-id">User ID :</label>
                        <input type="text" id="user-id" name="user_id" value="<?= $customer_data['userid']; ?>" disabled>

                        <label for="customer-plan">Plan :</label>
                        <select id="customer-plan" name="customer_plan" style="padding: 10px; background-color: #333; color: #fff; border: none; border-radius: 5px; width: 10cm;">
                            <option value="Normal" <?= $customer_data['plan'] == 'Normal' ? 'selected' : ''; ?>>Normal</option>
                            <option value="HD" <?= $customer_data['plan'] == 'HD' ? 'selected' : ''; ?>>HD</option>
                        </select>

                        <label for="activation">Activation :</label>
                        <select id="activation" name="plan_activation" style="padding: 10px; background-color: #333; color: #fff; border: none; border-radius: 5px; width: 10cm;">
                            <option value="YES" <?= $customer_data['plan_activation'] == 'YES' ? 'selected' : ''; ?>>YES</option>
                            <option value="NO" <?= $customer_data['plan_activation'] == 'NO' ? 'selected' : ''; ?>>NO</option>
                        </select>

                        <label for="password">Password :</label>
                        <input type="password" id="password" name="user_password" value="<?= $customer_data['user_password']; ?>" required>
                    </div>
                </div>
                <div class="submit-container">
                    <button type="submit" class="submit-button" name="update">Save Changes</button>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
