<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>
<body>
    <?php
     echo "<h1>hello this test</h1>";
     echo "<p>Today is</p>". date("Y/m/d") ."<p>br</p>";
    
     echo $_SERVER['SERVER_NAME'];
     echo "<br>";
     echo "<br>";
     echo $_SERVER['SCRIPT_NAME'];
     echo "<br>";
     echo "<br>";
     echo $_SERVER['HTTP_USER_AGENT'];
     echo "<br>";
     echo "<br>";
     
     
    ?>
</body>
</html>