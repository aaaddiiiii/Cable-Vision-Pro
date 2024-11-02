<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['userid'])) {
    $user_id = $_GET['userid'];
    $sql = "DELETE FROM userdata WHERE userid='$user_id'";
    $result = mysqli_query($data, $sql);
    if ($result) {
        $_SESSION['message'] = 'Deletion Successful';
    } else {
        $_SESSION['message'] = 'Deletion Failed: ' . mysqli_error($data);
    }
} else {
    $_SESSION['message'] = 'No user ID specified';
}

// Redirect to the customer list page (ensure this is the correct page name)
header("Location: customerdelete.php"); // Update this line to match your page
exit(); // Important to exit after a header redirect

?>
