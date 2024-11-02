<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cable Vision Pro</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Import the custom font */
        @font-face {
            font-family: 'Krona';
            src: url('Fonts/KronaOne-Regular.ttf') format('truetype'); 
            font-weight: normal;
            font-style: normal;
        }

        /* Body Styling */
        body {
            background-color: #141414;
            color: #f4f4f9;
            font-family: 'Krona', Arial, sans-serif; /* Use custom font */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px; /* Added padding for smaller screens */
        }

        /* Index Container */
        .index-container {
            background-color: #1f1f1f;
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.25);
        }

        /* Header */
        .index-container h1 {
            font-size: 2.5rem;
            color: #ffbb33;
            margin-bottom: 1rem;
            text-shadow: 2px 2px #000; /* Added text shadow for depth */
        }

        /* Description Paragraphs */
        .index-container p {
            color: #b3b3b3;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        /* Login Buttons */
        .login-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ffbb33;
            color: #141414;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Added shadow to buttons */
        }

        .btn:hover {
            background-color: #ff9900;
        }
    </style>
</head>
<body>
    <div class="index-container">
        <h1>Cable Vision Pro</h1>
        <p>Your all-in-one solution for seamless cable connection management. Designed with advanced features to handle everything from customer onboarding to billing with precision and ease.</p>
        <p>With Cable Vision Pro, you get reliable, secure, and user-friendly control over all your cable service needs.</p>
        
        <!-- Login Buttons -->
        <div class="login-buttons">
            <a href="LOGIN PAGES/userlogin.php" class="btn">User Login</a>
            <a href="LOGIN PAGES/adminlogin.php" class="btn">Admin Login</a>
        </div>
    </div>
</body>
</html>
