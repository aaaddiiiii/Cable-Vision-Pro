<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
if (isset($_POST['submit'])) {
    // Get the UID from the session (ensure this is set during user login)
    $uid = $_SESSION['userid']; // Make sure this session variable is set during login

    // Ensure UID is set
    if (empty($uid)) {
        die("User ID is not set in the session.");
    }

    $feedback = mysqli_real_escape_string($data, $_POST['feedback']);
    
    // Query to get the next available 'No'
    $query = "SELECT COALESCE(MAX(No), 0) + 1 AS next_no FROM feedback";
    $result = mysqli_query($data, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($data));
    }

    $row = mysqli_fetch_assoc($result);
    $next_no = $row['next_no'];

    // Insert feedback into the database with Resolved set to 'NO'
    $stmt = $data->prepare("INSERT INTO feedback (No, Uid, Feedback, Resolved) VALUES (?, ?, ?, 'NO')");
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($data));
    }

    $stmt->bind_param("iss", $next_no, $uid, $feedback);

    if ($stmt->execute()) {
        // Show JavaScript alert and redirect
        echo "<script>
                alert('Your Feedback Submitted!');
                window.location.href = 'newcomplaint.php'; // Redirect to feedback page or wherever you want
              </script>";
    } else {
        echo "Feedback submission failed: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
}

$data->close(); // Close the database connection
?>
