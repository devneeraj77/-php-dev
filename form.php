<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="div-form" style="min-height: 100vh">
        <form method="POST" action="request.php"> 
        <label for="name">Name</label><br>
        <input type="text"  value="test" name="name"><br>
        
        <label for="email">Email</label><br>
        <input type="email" value="test@example.com" name="email"><br>

        <label for="subject">subject</label><br>
        <input type="text" value=" For test" name="subject"><br>
        
        <label for="message">Message</label><br>
        <textarea id="message" name="message" value="Messages" rows="5" cols="40"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
    </div>

    <!-- <form action="contact_form.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject"><br><br>

    <label for="message">Your Message (optional):</label><br>
    <textarea id="message" name="message" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="Submit">
</form> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>