<?php

  $name = isset($_REQUEST['name']) ? htmlspecialchars(trim($_REQUEST['name'])) : '';
  $email = isset($_REQUEST['email']) ? htmlspecialchars(trim($_REQUEST['email'])) : '';
  $subject = isset($_REQUEST['subject']) ? htmlspecialchars(trim($_REQUEST['subject'])) : '';
  $message = isset($_REQUEST['message']) ? htmlspecialchars(trim($_REQUEST['message'])) : '';
  
  $updationdate_time = new DateTime("now", new DateTimeZone('Asia/Kolkata'));

  // Array to store potential errors
  $errors = [];
  if (empty($name)) {
    $errors[] = "Name is required.";
  }
  if (empty($email)) {
    $errors[] = "Email is required.";
  }
  if (empty($subject)) {
    $errors[] = "Subject is required.";
  }

  if (empty($message)) {
    $message = "No message provided."; 
  }

  if (!empty($errors)) {
    echo "<h2>Errors:</h2>";
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  } else {
    echo "<h2>Form Data:</h2>";
    echo "Name: " . $name . "</br>";
    echo "Email: " . $email . "</br>";
    echo "Subject: " . $subject . "</br>";
    echo "Message: " . $message . "</br>";
    echo "Server Name: " . $_SERVER['SERVER_NAME'] . "</br>";
    echo "Timestamp: " . $updationdate_time->format('Y-m-d h:i:s');
  }

?>
