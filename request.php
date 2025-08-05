<?php


  // $fname = htmlspecialchars($_REQUEST['fname']);
  // $lname = htmlspecialchars($_REQUEST['lname']);
  // $message = htmlspecialchars($_REQUEST['message']);
  // $updationdate_time = new DateTime("now", new DateTimeZone('America/New_York'));
  // if (empty($fname && $lname && $message)) {
  //   echo "Name is empty";
  // } else {
  //   echo $fname;
  //   echo " ";
  //   echo $lname . "</br>";
  //   echo " ";
  //   echo $message . "</br>" . $_SERVER['SERVER_NAME']. "</br>" ;
  //   echo " ";
  //   echo $updationdate_time->format('Y-m-d h:i:s');
  // }

  $servername = "localhost";
  $password = "Uc:q]&^5.MU>";
  $username = "fligzyxx_fixitfusion";
  $database = "fligzyxx_fixitfusion";
 
  $conn = new mysqli($servername, $password, $username, $database);
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
  $name =  htmlspecialchars($_PSOT['name']);
  $email = htmlspecialchars($_PSOT['email']) ;
  $subject = htmlspecialchars($_POST['subject']);
  $message =  htmlspecialchars($_POST['message']);
  $updationdate_time = new DateTime("now", new DateTimeZone('America/New_York'));
  
  $sql = "INSERT INTO contact_form VALUES ($name, $email, $subject, $message, $updationdate_time)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssss', $name, $email, $subject, $message, $updationdate_time);
  
  if ($stmt->execute() === TRUE) {
      echo "Data is saved successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   }
  $stmt->Close();
  $conn->Close();



//   $errors = [];
  
//   if (empty($name)) {
//       $errors[] = "Name is empty";
//   } 
  
//   if (empty($email)) {
//       $errors[] = "Email is empty";
//   } 
  
//   if (empty($subject)) {
//       $errors[] = "Subject is empty";
//   } 
  
//   if (empty($message)) {
//       $message = " ";
//   } 
  
//   if (!empty($errors)) {
//     echo "<h2>Errors:</h2>";
//     foreach ($errors as $error) {
//       echo $error . "<br>";
//     }
//   } else {
      
//     echo $name . "</br>";
//     echo " ";
//     echo $email . "</br>";
//     echo " ";
//     echo $subject . "</br>";
//     echo " ";
//     echo $message . "</br>" . $_SERVER['SERVER_NAME']. "</br>" ;
//     echo " ";
//     echo $updationdate_time->format('Y-m-d h:i:s');
//   }
  ?>