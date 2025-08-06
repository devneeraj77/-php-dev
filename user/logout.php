<?php
// Start the session to access and destroy it
session_start();
session_destroy();
header("Location: login.php");
exit(); 
?>
