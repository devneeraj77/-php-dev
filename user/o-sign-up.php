
<?php 

$message = ""; 
$success = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']); 
    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirm_password']; 
    // Basic validation 
   if (empty($username) || empty($password)) { 
       $message = "Username and password are required."; 
       
   } elseif ($password !== $confirmPassword) {
       $message = "Passwords do not match."; 
      } else { $file = 'object_users.json'; $users = []; 
         if (file_exists($file)) {
             $json = file_get_contents($file); 
             $users = json_decode($json, true); 
            } 
        // Check if username already exists 
      foreach ($users as $user) { 
      if ($user['username'] === $username) {
          $message = "Username already exists.";
          break; 
         } 
      } 
          if (!$message) {
             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
              $users[] = [
                'username' => $username,
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up</title>
   </head>
   <body>
      <section class="d-flex flex-column justify-content-center align-items-center ">
         <h2>Sign Up</h2>
         <?php if ($message): ?> 
         <div class="message <?php echo $message_type; ?>"> <?php echo $message; ?> </div>
         <div class="message <?php echo $message_type; ?>"> <?php echo $success; ?> </div>
         <?php endif; ?> 
         <form method="post" action="">
            <div class="form-group"> <label for="username">Username:</label> <input type="text" class="form-control" id="username" name="username" required> </div>
            <div class="form-group"> <label for="username">Email</label> <input type="text" class="form-control" id="email" name="email" required> <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> </div>
            <div class="form-group"> <label for="password">Password:</label> <input type="password" class="form-control" id="password" name="password" required> </div>
            <div class="form-group"> <label for="password">Confirm Password:</label> <input type="password" class="form-control" id="password" name="confirm_password" required> </div>
            <button type="submit" class="btn btn-primary">Sign Up</button> 
         </form>
         <p>Already have an account? <a href="login.php">Login here</a></p>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> 
   </body>
</html>