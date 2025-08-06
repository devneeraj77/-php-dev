<?php
// require_once 'db_connect.php'; // Include the database connection file
session_start(); // Start the session at the very beginning

// If the user is already logged in, redirect to dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body style="height: 100vh;">
    <main class=" border rounded p-4 w-100 m-auto">
        <h2 class="text-center mb-4">Login</h2>
        <form action="authenticate.php" method="post">
            <label for="username" class="">Username
                <input type="text" id="username" name="username" required>
            </label>
            <label for="password" class="form-label">Password
                <input type="password" id="password" name="password" required>
            </label>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>

    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p style="color:red;">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);  // Clear the error after displaying
    }
    ?>
</body>

</html>