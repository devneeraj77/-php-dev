<?php
// require_once 'db_connenct.php'; // Include configuration file for database connection if needed
session_start();

// Basic validation (replace with database lookup for real applications)
// $valid_username = 'user';
// $valid_password = 'password123'; // In a real application, hash and verify passwords securely


// $users = [
//     'user1' => ':ZPM$^=$IwHf',
//     'user2' => 'securepwd',
//     'neerajrekwar' => 'neeraj123',
// ];
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $usersData = json_decode(file_get_contents('object_users.josn'), true);

    if ($usersData($username, $users) && $users[$username] == $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $message = 'user verification!';
        session_regenerate_id(true); // Prevent session fixation
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php"); // Redirect if accessed directly
    exit;
}
?>