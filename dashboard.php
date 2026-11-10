<?php
session_start();

// Only logged-in users can open the dashboard
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>LSB Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container dashboard">
        <h1>Welcome to LSB!</h1>
        <p class="subtitle">Hello, <?php echo htmlspecialchars($fullname); ?>!</p>
        <p>You have successfully logged in to your account.</p>

        <a class="logout-button" href="logout.php">LOG OUT</a>
    </div>
</body>
</html>
