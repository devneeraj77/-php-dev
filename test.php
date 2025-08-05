<?php
$servername = "localhost"; // Or your MySQL server address
$username = "fligzyxx_fixitfusion";      // Your MySQL username
$password = "Uc:q]&^5.MU>"; // Your MySQL password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create database
$sql = "CREATE DATABASE contact_form"; // Replace 'mydatabase' with your desired database name

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>