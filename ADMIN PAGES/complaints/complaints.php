<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Query to fetch all complaints along with customer name and username
$query = "
    SELECT u.user_name, u.userid, f.No, f.Feedback, f.resolved 
    FROM feedback f 
    JOIN userdata u ON u.userid = f.Uid
";

$result = mysqli_query($data, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($data));
}

$complaints = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Previous Complaints</title>
    <style>
        .complaints-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin: 20px;
            overflow-y: auto;
            height: calc(100vh - 150px);
        }
        .complaint-wrapper {
            width: 8cm;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin: 10px;
        }
        .customer-info {
            font-weight: bold;
            font-size: 14px;
            color: #fff;
            text-align: left;
            padding-left: 0;
            margin-left: 10px;
        }
        .complaint-box {
            width: 8cm;
            height: 6cm;
            background-color: #333;
            color: white;
            border-radius: 10px;
            margin: 10px;
            padding: 1cm;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left;
            font-size: 16px;
            box-sizing: border-box;
            overflow: hidden;
        }
        .resolved-button {
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Krona', sans-serif;
            text-align: left;
            width: fit-content;
            margin-left: 10px;
        }
        /* Style for resolved status text */
        .resolved-status {
            color: green;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button" onclick="window.location.href='../../LOGIN PAGES/adminhome.php'">Go Back</button>
            <button class="side-button logout" onclick="window.location.href='../../index.php'">LOG OUT</button>
            </div>
        </div>
        <div class="main-content">
            <h1>Complaints</h1>
            <div class="complaints-container">
                <?php
                if (count($complaints) > 0) {
                    foreach ($complaints as $complaint) {
                        echo '<div class="complaint-wrapper">';
                        echo '<div class="customer-info"> ' . htmlspecialchars($complaint['user_name']) . ' (User ID: ' . htmlspecialchars($complaint['userid']) . ')</div>';
                        echo '<div class="complaint-box">' . htmlspecialchars($complaint['Feedback']) . '</div>';
                        
                        // Show "RESOLVE" button only if complaint is not resolved
                        if ($complaint['resolved'] !== 'YES') {
                            echo '<form action="resolve_complaint.php" method="POST">';
                            echo '<input type="hidden" name="complaint_id" value="' . htmlspecialchars($complaint['No']) . '">';
                            echo '<button type="submit" class="resolved-button">RESOLVE</button>';
                            echo '</form>';
                        } else {
                            echo '<div class="resolved-status">RESOLVED</div>';
                        }

                        echo '</div>';
                    }
                } else {
                    echo '<div class="complaint-box">No complaints found.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($data);
?>
