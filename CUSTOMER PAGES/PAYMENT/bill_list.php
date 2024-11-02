<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location: userlogin.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$userid = $_SESSION['userid'];
$sql = "SELECT Duedate, Amount, Paid FROM fullbill WHERE Uname = (SELECT user_name FROM userdata WHERE userid = '$userid')";
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
    <title>Your Bill List</title>
    <link rel="stylesheet" href="style_bill_list.css">
</head>
<body>
    <div class="container">
        <!-- Side Panel -->
        <div class="side-panel">
            <div class="button-container">
                <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/customerhome.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Your Bill List</h1>
            <table border="2px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">No</th>
                    <th style="padding: 20px; font-size: 15px;">Due Date</th>
                    <th style="padding: 20px; font-size: 15px;">Amount</th>
                    <th style="padding: 20px; font-size: 15px;">Paid</th>
                </tr>

                <?php
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    $paidValue = $row['Paid'] === 'YES' ? 
                        "<a href='transaction_details.php?rowid={$count}' style='color: green;'>YES</a>" : 
                        "<a href='upiinput.php?rowid={$count}' style='color: red;'>NO</a>";
                ?>
                <tr>
                    <td style="padding: 20px; font-size: 15px;"><?php echo $count++; ?></td>
                    <td style="padding: 20px; font-size: 15px;"><?php echo htmlspecialchars($row['Duedate']); ?></td>
                    <td style="padding: 20px; font-size: 15px;"><?php echo htmlspecialchars($row['Amount']); ?></td>
                    <td style="padding: 20px; font-size: 15px;"><?php echo $paidValue; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
