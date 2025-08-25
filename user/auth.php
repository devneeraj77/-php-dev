<?php 
 session_start();

 $error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputUser = $_POST['username'];
    $inputPass = $_POST['password'];

    $usersData = json_decode(file_get_contents('array_users.json'), true);
    // $usersData = json_decode(file_get_contents('object_users.json'), true);

    foreach ($usersData as $user) {
        if ($user['username'] === $inputUser && password_verify($inputPass, $user['hashPass'])) {
            $_SESSION['username'] = $inputUser;
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "Invalid username or password.";
}
?>
 <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>