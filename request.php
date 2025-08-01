<?php

  $fname = htmlspecialchars($_REQUEST['fname']);
  $lname = htmlspecialchars($_REQUEST['lname']);
  $message = htmlspecialchars($_REQUEST['message']);
  $updationdate_time = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
  if (empty($fname && $lname && $message)) {
    echo "Name is empty";
  } else {
    echo $fname;
    echo " ";
    echo $lname . "</br>";
    echo " ";
    echo $message . "</br>" . $_SERVER['SERVER_NAME']. "</br>" ;
    echo " ";
    echo $updationdate_time->format('Y-m-d h:i:s');
  }

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "";

// // create connection
// $conn = new mysqli('localhost', 'root', '', '');

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $fname = htmlspecialchars($_REQUEST['fname']);
//   $lname = htmlspecialchars($_REQUEST['lname']);
  
//   $sql = "INSERT INTO contactustable VALUES ($fname, $lname)";
  
//   $stmt = $conn->prepare($sql);
//   $stmt->bind_param("ss", $fname. $lname);
  
//   if ($stmt->execute() === TRUE) {
//     echo "Data saved successfully!";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
//   $stmt->close();
//   $conn->close();

// }
  ?>