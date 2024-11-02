<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style_login.css">
    <style>
        .error-message {
            color: red; /* Set the text color to red */
            font-size: 14px; /* Optional: set a font size for better visibility */
            margin-top: 10px; /* Optional: add some space above the message */
            padding-left: 15px;
            padding-top: 14px;
        }
    </style>
</head>

<body class="bg_main">
    <form action="alogin_check.php" method="POST" class="login_form">
        <h1 class="headingmain">Admin Login</h1>
        <div class="blk1">
            <label>Username :&nbsp;</label>
            <input type="text" name="username" class="textbox1_1" required>
        </div>

        <div class="blk1">
            <label>Password &nbsp;:&nbsp;</label>
            <input type="password" name="password" class="textbox1_2" spellcheck="false" required>
        </div>

        <div>
            <input class="submit_button_a" type="submit" name="submit" value="Login">
        </div>
        <h4 class="error-message">
            <?php
                session_start();
                if (isset($_SESSION['loginMessage'])) {
                    echo $_SESSION['loginMessage'];
                    unset($_SESSION['loginMessage']); // Clear the message after displaying it
                }
            ?>
        </h4>
    </form>
    
</body>
</html>
