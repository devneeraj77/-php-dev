<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
</head>
<body>
    
    <?php
    $message = '';
    $message_type = '';
    $file = 'object_users.json';
    
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Basic validation
        if (empty($username) || empty($password)) {
            $message = 'All fields are required.';
            $message_type = 'error';
        } else {
            // Read the existing JSON data from the file
            $jsonData = file_get_contents($file);
            $users = json_decode($jsonData, true) ?? [];
            
            // Check if username already exists
            if (isset($users[$username])) {
                $message = 'Username already registered.';
                $message_type = 'error';
            } else {

                // Get the current date and time
                $now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
                
                // Create a new user array based on the desired format
                $newUser = [
                    'username' => $username,
                    'hashPass' => password_hash($password, PASSWORD_DEFAULT),
                    'last_login' => [
                        'date' => $now->format('Y-m-d h:i:s.u'),
                        'timezone_type' => 3,
                        'timezone' => $now->getTimezone()->getName()
                        ]
                    ];
                    
                    // Add the new user to the users object using the username as the key
                $users[uniqid()] = $newUser;

                // Encode the entire object back into a JSON string
                $newJsonData = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
 
                // Save the updated JSON data back to the file

                if (file_put_contents($file, $newJsonData)) {
                    $message = 'Sign up successful! You can now log in.';
                    $message_type = 'success';
                } else {
                    $message = 'Error saving user data. Please try again.';
                    $message_type = 'error';
                }
            }
        }
    }
    // $message = ' ';
    ?>
<section class="d-flex flex-column justify-content-center align-items-center ">
    <h2>Sign Up</h2>
        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password"  class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  
</body>
</html>
