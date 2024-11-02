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

$rowid = $_GET['rowid'];
$sql = "SELECT Paid, Amount, TransID, UPIID FROM fullbill WHERE No = ?";
$stmt = $data->prepare($sql);
$stmt->bind_param("i", $rowid);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link rel="stylesheet" href="style_transaction_details.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='bill_list.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Transaction Details</h1>
            <div class="details-container">
                <div class="detail-item">
                    <label>Payment Status:</label>
                    <input type="text" value="<?php echo htmlspecialchars($transaction['Paid']); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Amount:</label>
                    <input type="text" value="<?php echo htmlspecialchars($transaction['Amount']); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Transaction ID:</label>
                    <input type="text" value="<?php echo htmlspecialchars($transaction['TransID']); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>UPI ID:</label>
                    <input type="text" value="<?php echo htmlspecialchars($transaction['UPIID']); ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
