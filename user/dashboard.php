<?php
session_start(); // Start the session to access session variables // Include the database connection file
// Check if the user is logged in
if (!isset($_SESSION['username'])) { // Assuming 'username' is stored in the session upon successful login
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Retrieve user information from the session (or fetch from the database using the stored user ID)
$username = $_SESSION['username'];  // Assuming 'username' is also stored in the session

// $well = print_r(session_status())

// You can fetch more user data from the database using the $userId here
// For example:
// $sql = "SELECT * FROM users WHERE id = ?";
// $stmt = $db->prepare($sql);
// $stmt->bind_param("i", $userId);
// $stmt->execute();
// $result = $stmt->get_result();
// $userData = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file for styling -->
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <p>This is your personalized dashboard.</p>
        
        <!-- Display other user information (optional) -->
        <!-- <p>Email: <?php // echo $userData['email']; ?></p> -->

        <p><a href="logout.php">Logout</a></p> <!-- Link to the logout script -->
    </div>
</body>
</html>
