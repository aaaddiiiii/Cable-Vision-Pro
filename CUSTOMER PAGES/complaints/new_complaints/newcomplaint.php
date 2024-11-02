<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feedback</title>
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
            <h1>Feedback Section</h1>
            <form action="submit_feedback.php" method="POST" class="customer-form">
                <div class="input-container">
                    <label for="feedback">Your Feedback:</label>
                    <textarea id="feedback" name="feedback" required></textarea>
                </div>
                <div class="submit-container">
                    <button type="submit" class="submit-button" name="submit">Submit Feedback</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
