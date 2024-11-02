<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "cableconnection";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if (isset($_POST['update'])) {
    $userid = $_SESSION['userid'];
    $user_name = mysqli_real_escape_string($data, $_POST['customer_name']);
    $email = mysqli_real_escape_string($data, $_POST['customer_email']);
    $pno = mysqli_real_escape_string($data, $_POST['customer_phone']);
    $addr = mysqli_real_escape_string($data, $_POST['customer_address']);

    // Update the user's information
    $stmt = $data->prepare("UPDATE userdata SET user_name=?, email=?, pno=?, addr=? WHERE userid=?");
    $stmt->bind_param("sssss", $user_name, $email, $pno, $addr, $userid);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully";
        header("location:editprofile.php");
    } else {
        echo "Update FAILED: " . $stmt->error;
    }

    $stmt->close();
}

$data->close();
?>
