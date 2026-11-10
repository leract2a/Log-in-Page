<?php
session_start();
include "db.php";

$message = "";

// Run this code when the Register button is clicked
if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if all fields have values
    if ($fullname == "" || $email == "" || $password == "") {
        $message = "Please complete all fields.";
    } else {
        // Check if the email is already registered
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email is already registered.";
        } else {
            // Encrypt the password before saving it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Save the new user in the database
            $insert = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $fullname, $email, $hashedPassword);

            if ($insert->execute()) {
                $message = "Registration successful! You can now login.";
            } else {
                $message = "Registration failed. Please try again.";
            }
            $insert->close();
        }

        $check->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LSB Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>LSB Sign Up</h1>
        <p class="subtitle">Create your account</p>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php } ?>

        <form method="POST" action="register.php">
            <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your full name" required>

            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Create a password" required>

            <button type="submit" name="register">REGISTER</button>
        </form>

        <p class="bottom-text">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
