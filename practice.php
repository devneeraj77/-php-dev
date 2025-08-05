<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function get_contents()
    {
        file_get_contents("https://fixitfusion.com/");
        print_r($http_response_header); // variable is populated in the local scope
    }
    echo '<pre>';
    get_contents();
    echo '<pre>';
    ?>
</body>

</html>