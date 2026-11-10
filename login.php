<?php
session_start();
include "db.php";

$message = "";

// Run this code when the Login button is clicked
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Find the account using the entered email
    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $fullname, $savedPassword);

    // Check the password if the account exists
    if ($stmt->fetch()) {
        if (password_verify($password, $savedPassword)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['fullname'] = $fullname;

            $stmt->close();
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "Account not found. Please register first.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LSB Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>LSB Sign In</h1>
        <p class="subtitle">Welcome back! Please login to your account.</p>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php } ?>

        <form method="POST" action="login.php">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" name="login">LOGIN</button>
        </form>

        <p class="bottom-text">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
