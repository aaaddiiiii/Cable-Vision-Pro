<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="style_login.css">
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            padding-left: 15px;
            padding-top: 14px;
        }
    </style>
</head>
<body class="bg_main">
    <form action="ulogin_check.php" method="POST" class="login_form">
        <h1 class="headingmain">User Login</h1>
        <div class="blk1">
            <label>Username :&nbsp;</label>
            <input type="text" name="username" class="textbox2_2" required>
        </div>
        <div class="blk1">
            <label>Password &nbsp;:&nbsp;</label>
            <input type="password" name="password" class="textbox2_2" spellcheck="false" required>
        </div>
        <div>
            <input class="submit_button_u" type="submit" name="submit" value="Login">
        </div>
        <h4 class="error-message">
            <?php
                session_start();
                if (isset($_SESSION['loginMessage'])) {
                    echo $_SESSION['loginMessage'];
                    unset($_SESSION['loginMessage']);
                }
            ?>
        </h4>
    </form>
</body>
</html>
