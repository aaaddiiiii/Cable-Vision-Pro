<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: userlogin.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

$rowid = $_GET['rowid'];
$sql = "SELECT TransID, UPIID, Paid, Amount FROM fullbill WHERE No = ?";
$stmt = $data->prepare($sql);
$stmt->bind_param("i", $rowid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="style_transaction_details.css">
</head>
<body>
    <div class="container">
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='fullbill.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../../index.php'">LOG OUT</button>
        </div>

        <div class="main-content">
            <h1>Payment Details</h1>
            <div class="details-container">
                <div class="detail-item">
                    <label>Transaction ID:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['TransID'] ?? ''); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>UPI ID:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['UPIID'] ?? ''); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Payment Status:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['Paid'] ?? ''); ?>" readonly>
                </div>
                <div class="detail-item">
                    <label>Payment Amount:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['Amount'] ?? ''); ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
