<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

// Connect to the database
$data = new mysqli($host, $user, $password, $db);

if ($data->connect_error) {
    die("Connection error: " . $data->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['apply'])) {
    // Retrieve the form inputs
    $bill_receiver = $_POST['bill_receiver'];
    $due_date = $data->real_escape_string($_POST['due_date']);
    $amount = $data->real_escape_string($_POST['amount']);

    // Get the next available No for billist
    $result = $data->query("SELECT MAX(No) AS max_no FROM billist");
    $row = $result->fetch_assoc();
    $next_no = ($row['max_no'] !== null) ? $row['max_no'] + 1 : 1;

    // Insert the new bill into billist
    $stmt = $data->prepare("INSERT INTO billist (No, BillReceiver, DueDate, Amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issd", $next_no, $bill_receiver, $due_date, $amount);
    if (!$stmt->execute()) {
        echo "Failed to create bills in billist: " . $stmt->error;
        exit();
    }
    $stmt->close();

    // Define the query to fetch user data based on bill_receiver selection
    $user_query = "SELECT user_name AS Uname FROM userdata WHERE usertype = 'customer'";
    if ($bill_receiver === "normal") {
        $user_query .= " AND plan = 'Normal'";
    } elseif ($bill_receiver === "hd") {
        $user_query .= " AND plan = 'HD'";
    }

    $users = $data->query($user_query);
    if (!$users) {
        echo "Error fetching users: " . $data->error;
        exit();
    }

    // Insert bill details for each user in fullbill
    $fullbill_stmt = $data->prepare("INSERT INTO fullbill (Uname, Duedate, Amount, Paid) VALUES (?, ?, ?, 'NO')");
    while ($user = $users->fetch_assoc()) {
        $Uname = $user['Uname'];
        $fullbill_stmt->bind_param("ssd", $Uname, $due_date, $amount);
        if (!$fullbill_stmt->execute()) {
            echo "Failed to create bills in fullbill: " . $fullbill_stmt->error;
            exit();
        }
    }

    // Cleanup
    $fullbill_stmt->close();
    $data->close();

    // Set success message and redirect back to billing page
    $_SESSION['message'] = "Bills created successfully!";
    header("Location: billing.php");
    exit();
}
?>
