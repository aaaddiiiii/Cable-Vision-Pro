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
    $userid = mysqli_real_escape_string($data, $_POST['user_id']);
    $new_password = mysqli_real_escape_string($data, $_POST['new_password']);

    // Prepare the SQL update statement to change the password for the given user ID
    $stmt = $data->prepare("UPDATE userdata SET user_password = ? WHERE userid = ? AND usertype = 'admin'");
    
    // Bind the new password and user ID
    $stmt->bind_param("ss", $new_password, $userid);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Password changed successfully";
        } else {
            $_SESSION['message'] = "Admin not found or no changes made";
        }
        header("location:changeadminpassword.php"); // Redirect back to the form
    } else {
        echo "Password update FAILED: " . $stmt->error; // Include error details for debugging
    }

    $stmt->close(); // Close the statement
}

$data->close(); // Close the database connection
?>
