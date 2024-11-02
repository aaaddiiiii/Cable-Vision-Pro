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

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    die("User is not logged in.");
}

// Get the logged-in user's ID from the session
$loggedInUserId = $_SESSION['userid'];

// Query to fetch all complaints along with resolved status for the logged-in user
$query = "
    SELECT f.Feedback, f.Resolved 
    FROM feedback f 
    WHERE f.Uid = '$loggedInUserId'
"; // Filter complaints by the logged-in user

$result = mysqli_query($data, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($data));
}

$complaints = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Previous Complaints</title>
    <style>
    /* Additional styling for complaints */
    .complaint-box {
        width: 9.25cm;              /* Set width to 9.25 cm */
        height: 6cm;                /* Set height to 6 cm */
        color: black;               /* Change text color to black */
        border-radius: 10px;
        margin: 10px;               /* Margin between boxes */
        padding: 1cm;               /* Inner padding of 1 cm (1 cm margin inside the box) */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: left;           /* Align text to the left */
        font-size: 16px;
        box-sizing: border-box;      /* Include padding and border in element's total width and height */
        overflow: hidden;            /* Hide overflow text */
    }
    .complaints-container {
        display: flex;
        flex-wrap: wrap;             /* Wrap to the next line */
        justify-content: flex-start; /* Align items to the left */
        margin: 20px;               /* Add margin around the container */
        overflow-y: auto;           /* Enable vertical scrolling for complaints */
        height: calc(100vh - 150px); /* Limit height to avoid internal scrolling */
    }
    .complaint-wrapper {
        width: 9.25cm;               /* Consistent width for alignment */
        display: flex;
        flex-direction: column;       /* Stack complaints vertically */
        align-items: flex-start;      /* Align items to the start (left) */
        margin: 10px;                 /* Margin for the wrapper */
    }
    /* Define styles for resolved and unresolved complaints */
    .resolved {
        background-color: lightgreen; /* Light green for resolved */
    }
    .unresolved {
        background-color: lightcoral; /* Light red for unresolved */
    }
</style>

</head>
<body>
    <div class="container">
        <div class="side-panel">
            <div class="button-container">
            <button class="side-button"onclick="window.location.href='../complaints_menu.php'">Go Back</button>
            <button class="side-button logout" onclick="window.location.href='../../../index.php'">LOG OUT</button>
            </div>
        </div>
        <div class="main-content">
            <h1>Complaints</h1>
            <div class="complaints-container">
                <?php
                // Check if there are any complaints and display them
                if (count($complaints) > 0) {
                    foreach ($complaints as $complaint) {
                        // Determine the class based on resolved status
                        $statusClass = ($complaint['Resolved'] === 'YES') ? 'resolved' : 'unresolved';

                        echo '<div class="complaint-wrapper">';
                        echo '<div class="complaint-box ' . $statusClass . '">' . htmlspecialchars($complaint['Feedback']) . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="complaint-box unresolved">No complaints found.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($data); // Close the database connection
?>
