<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location: userlogin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "cableconnection";
    $data = mysqli_connect($host, $user, $password, $db);

    if (!$data) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $transID = $_POST['transaction_id'];
    $upiID = $_POST['upi_id'];
    $rowid = $_GET['rowid'];

    $sql = "UPDATE fullbill SET TransID = ?, UPIID = ?, Paid = 'YES' WHERE No = ?";
    $stmt = $data->prepare($sql);
    $stmt->bind_param("ssi", $transID, $upiID, $rowid);
    $stmt->execute();

    $_SESSION['message'] = "Transaction successful!";
    echo "<script>alert('Transaction successful!'); window.location.href='bill_list.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Payment</title>
    <link rel="stylesheet" href="style_upiinput.css">
</head>
<body>
    <div class="container">
        <!-- Left Side Panel -->
        <div class="side-panel">
            <div class="button-container">
                <button class="side-button" onclick="window.location.href='bill_list.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../../index.php'">LOG OUT</button>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1>Enter Payment Details</h1>
            <form method="POST" class="customer-form">
                <div class="input-container">
                    <div class="left-container">
                        <label for="transaction_id">Transaction ID :</label>
                        <input type="text" id="transaction_id" name="transaction_id" required>
                    </div>

                    <div class="right-container">
                        <label for="upi_id">UPI ID :</label>
                        <input type="text" id="upi_id" name="upi_id" required>
                    </div>
                </div>

                <div class="submit-container">
                    <button type="submit" class="submit-button">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
