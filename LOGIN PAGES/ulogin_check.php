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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate inputs
    $name = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if (empty($name) || empty($pass)) {
        $_SESSION['loginMessage'] = "Username or Password cannot be empty!";
        header("location: userlogin.php");
        exit();
    }

    // Prepare and execute the SQL statement to prevent SQL injection
    $stmt = $data->prepare("SELECT * FROM userdata WHERE userid = ? AND user_password = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userid'] = $row['userid']; // Store userid in session for consistency

        // Redirect based on usertype
        if ($row["usertype"] == "customer") {
            header("location: customerhome.php");
        } else {
            header("location: adminhome.php");
        }
        exit();
    } else {
        $_SESSION['loginMessage'] = "Username or Password INCORRECT!";
        header("location: userlogin.php");
        exit();
    }
}
?>
