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

// Check if the complaint ID is provided
if (isset($_POST['complaint_id'])) {
    $complaint_id = $_POST['complaint_id'];

    // Update the complaint to mark it as resolved
    $query = "UPDATE feedback SET resolved = 'YES' WHERE No = ?";
    $stmt = mysqli_prepare($data, $query);
    mysqli_stmt_bind_param($stmt, "i", $complaint_id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to complaints page
        header("Location: complaints.php");
        exit();
    } else {
        echo "Error resolving complaint: " . mysqli_error($data);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "No complaint ID provided.";
}

mysqli_close($data);
?>
