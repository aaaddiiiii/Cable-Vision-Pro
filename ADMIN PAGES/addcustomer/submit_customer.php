<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost"; // Hostname
$username = "root"; // MySQL username
$password = ""; // MySQL password (default is blank for XAMPP)
$dbname = "cableconnection"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['apply'])) {
    // Retrieve and sanitize input data
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $customer_email = $conn->real_escape_string($_POST['customer_email']);
    $customer_phone = $conn->real_escape_string($_POST['customer_phone']);
    $customer_address = $conn->real_escape_string($_POST['customer_address']);
    $user_id = $conn->real_escape_string($_POST['user_id']); // Correct form input
    $customer_plan = $conn->real_escape_string($_POST['customer_plan']);
    $plan_activation = $conn->real_escape_string($_POST['plan_activation']);
    $user_password = $conn->real_escape_string($_POST['user_password']);
    $user_type = "customer"; // Assuming the user type is set to "customer" by default

    // Insert customer into the database
    $sql = "INSERT INTO userdata (userid, user_password, user_name, pno, email, addr, plan, plan_activation, usertype)
            VALUES ('$user_id', '$user_password', '$customer_name', '$customer_phone', '$customer_email', '$customer_address', '$customer_plan', '$plan_activation', '$user_type')";

    // Execute the query and handle success or error
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Customer added successfully!";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirect back to addcustomer.php
    header("Location: addcustomer.php");
    exit();
}

// Close the connection
$conn->close();
?>
