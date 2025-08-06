<?php 
 $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
 if (mysqli_query($conn, $sql)) {
     echo "Table users created successfully.";
 } else {
     echo "Error creating table: " . mysqli_error($conn);
 }
 
 // Close the connection
 mysqli_close($conn);
 // Redirect to the sign-up page
?>