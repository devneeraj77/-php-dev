<?php
session_start(); // Start the session to access session variables // Include the database connection file
// Check if the user is logged in

    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 60)) { // 1800 seconds = 30 minutes
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redirect to login page
        exit();
    }
    $_SESSION['last_activity'] = time(); // Update last activity time
// Retrieve user information from the session (or fetch from the database using the stored user ID)
$username = $_SESSION['username'];  // Assuming 'username' is also stored in the session // Assuming 'username' is also stored in the session

// You can fetch more user data from the database using the $userId here
// For example:
// $sql = "SELECT * FROM users WHERE id = ?";
// $stmt = $db->prepare($sql);
// $stmt->bind_param("i", $userId);
// $stmt->execute();
// $result = $stmt->get_result();
// $userData = $result->fetch_assoc();
    $filePath = 'users.json';
    $jsonData = [];
    if (file_exists($filePath)) {
        $fileContent = file_get_contents($filePath);
        $jsonData = json_decode($fileContent, true); // Decode as associative array
        if ($jsonData === null) { // Handle JSON decoding errors
            $jsonData = []; // Initialize as empty array if decode fails
        }
    }

    $normPassword = $_SESSION['password'] ?? ''; // Assuming password is stored in session, not recommended for production
    $hashPass = password_hash($normPassword, PASSWORD_DEFAULT); // Assuming password is stored in session, not recommended for production
    $userDataToSave = [
        'username' => $_SESSION['username'],
        'hashPass' => $hashPass, // Assuming password is stored in session, not recommended for production
        'last_login' => new DateTime("now", new DateTimeZone('Asia/Kolkata')),
    ];

    // Example: Store data keyed by user ID
    $jsonData[$username] = $userDataToSave;
    $jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonString); // Save the updated JSON data back to the file
// Display the dashboard content
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
