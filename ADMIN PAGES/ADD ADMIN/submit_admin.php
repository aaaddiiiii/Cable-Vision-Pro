<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Check if the form has been submitted
if (isset($_POST['apply'])) {
    $user_name = mysqli_real_escape_string($data, $_POST['admin_name']);
    $email = mysqli_real_escape_string($data, $_POST['admin_email']);
    $pno = mysqli_real_escape_string($data, $_POST['admin_phone']);
    $userid = mysqli_real_escape_string($data, $_POST['admin_id']);
    $user_password = mysqli_real_escape_string($data, $_POST['admin_password']);

    // Use prepared statements to prevent SQL injection
    $stmt = $data->prepare("INSERT INTO userdata(userid, user_password, user_name, pno, email, usertype) VALUES (?, ?, ?, ?, ?, 'admin')");
    
    // Bind parameters (5 variables corresponding to the placeholders in the query)
    $stmt->bind_param("sssss", $userid, $user_password, $user_name, $pno, $email);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['message'] = "New Admin Added";
        header("location:addadmin.php"); // Redirect back to the form
    } else {
        echo "Admin saving FAILED: " . $stmt->error; // Include error details for debugging
    }

    $stmt->close(); // Close the statement
}

$data->close(); // Close the database connection
?>