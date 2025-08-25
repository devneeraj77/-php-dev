<?php 
session_start();

$message = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Basic validation
    if (empty($username) || empty($email) || empty($password)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif ($password !== $confirmPassword) {
        $message = "Passwords do not match.";
    } else {
        $file = 'array_users.json';
        $users = [];

        if (file_exists($file)) {
            $json = file_get_contents($file);
            $users = json_decode($json, true);

            // Ensure users is always an array
            if (!is_array($users)) {
                $users = [];
            }
        }

        // Check if username already exists
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $message = "Username already exists.";
                break;
            }
            if ($user['email'] === $email) {
                $message = "Email already registered.";
                break;
            }
        }

        if (!$message) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $users[] = [
                'username' => $username,
                'email'    => $email,
                'password' => $hashedPassword
            ];

            file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
            $success = "Registration successful! You can now <a href='login.php'>log in</a>.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    
<section class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <h2 class="mb-4">Sign Up</h2>

        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group mb-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password"  class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group mb-4">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password"  class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
        <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</section>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
