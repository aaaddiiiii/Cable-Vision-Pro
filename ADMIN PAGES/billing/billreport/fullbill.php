<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT No, Uname, Duedate, Amount, Paid FROM fullbill";
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
    <title>Bill List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../billingmenu.php'">Go Back</button>
            </div>
            <button class="side-button logout" onclick="window.location.href='../../../index.php'">LOG OUT</button>
        </div>

        <div class="main-content">
            <h1>Bill List</h1>
            <table border="2px">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Due Date</th>
                    <th>Amount</th>
                    <th>Paid</th>
                </tr>

                <?php
                $count = 1;
                while ($info = $result->fetch_assoc()) {
                    $paidValue = $info['Paid'] === 'YES' ? 
                        "<a href='payment_details_record.php?rowid=" . $info['No'] . "' style='color: green;'>YES</a>" : 
                        "<span style='color: red;'>NO</span>";
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($info['Uname']); ?></td>
                    <td><?php echo htmlspecialchars($info['Duedate']); ?></td>
                    <td><?php echo htmlspecialchars($info['Amount']); ?></td>
                    <td><?php echo $paidValue; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
