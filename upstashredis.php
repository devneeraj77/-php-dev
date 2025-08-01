<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $key = $_POST['key'];
        $value = $_POST['value'];

        $url = "/set/$key";  
        $auth_token = "Bearer <token>";  

        $data = json_encode($value);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $auth_token,
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode === 200) {
            echo "Key stored in Upstash Redis!";
        } else {
            echo " Error storing data. Response: $response";
        }
    }
    ?>

    <form method="post">
        <label>Key: <input type="text" name="key" required></label><br>
        <label>Value: <input type="text" name="value" required></label><br>
        <button type="submit">Save to Redis</button>
    </form>

</body>

</html>