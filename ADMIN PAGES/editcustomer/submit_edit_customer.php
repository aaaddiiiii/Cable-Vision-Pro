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
    $userid = mysqli_real_escape_string($data, $_POST['userid']);
    $user_name = mysqli_real_escape_string($data, $_POST['customer_name']);
    $email = mysqli_real_escape_string($data, $_POST['customer_email']);
    $pno = mysqli_real_escape_string($data, $_POST['customer_phone']);
    $addr = mysqli_real_escape_string($data, $_POST['customer_address']);
    $plan = mysqli_real_escape_string($data, $_POST['customer_plan']);
    $plan_activation = mysqli_real_escape_string($data, $_POST['plan_activation']);
    $user_password = mysqli_real_escape_string($data, $_POST['user_password']);

    // Update the customer information
    $stmt = $data->prepare("UPDATE userdata SET user_name=?, email=?, pno=?, addr=?, plan=?, plan_activation=?, user_password=? WHERE userid=?");
    $stmt->bind_param("ssssssss", $user_name, $email, $pno, $addr, $plan, $plan_activation, $user_password, $userid);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Customer details updated successfully";
        header("location:editcustomer.php");
    } else {
        echo "Update FAILED: " . $stmt->error;
    }

    $stmt->close();
}

$data->close();
?>
