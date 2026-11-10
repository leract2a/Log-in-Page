<?php
session_start();

// Remove the user's session when logging out
session_unset();
session_destroy();

// Return to the login page
header("Location: login.php");
exit();
?>
