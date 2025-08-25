<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title>
</head>
<body>
<?php

$arrayFilePath = 'array_users.json'; 
if (file_exists($arrayFilePath)) {
    $jsonData = file_get_contents($arrayFilePath); 
    $data = json_decode($jsonData, true); 
    $ausers = $data;
    
    if (json_last_error() === JSON_ERROR_NONE) {
        // echo json_encode($data); 
        echo 'data fetched';
    } else {
        echo json_encode(['error' => 'Error decoding JSON: ' . json_last_error_msg()]);
    }
} else {
    echo json_encode(['error' => 'JSON file not found.']);
}


$objectFilePath = 'object_users.json';
if (file_exists($objectFilePath)) {
  $jsonData = file_get_contents($objectFilePath);
  $data = json_decode($jsonData, true);
  $ousers = $data;
}
?>
<section>
<h2 style="text-align: center;">Array User Table</h2>
  <table>
    <tr>
      
      <th>USERNAME</th>
      <th>IMAGE</th>

    </tr>
    <?php foreach ($ausers ?? [] as $user): ?>
      <tr style="width:50px;">
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td><?= htmlspecialchars($user['password']) ?></td>
        <td><img src="https://i.pravatar.cc/150?img=<?= mt_rand(1, 50) ?>" alt="avatar" width="50" /></td>
      </tr>
    <?php endforeach; ?>
    </table>
</section>
<section>
<h2 style="text-align: center;">Object User Table</h2>
  <table>
    <tr>
      
      <th>USERNAME</th>
      <th>HASHPASS</th>
      <th>IMAGE</th>

    </tr>
    <?php foreach ($ousers as $userId => $userData): ?>
      <tr style="width:50px;">
        <td><?= htmlspecialchars($userId) ?></td>
        <td><?= htmlspecialchars($userData['username']) ?></td>
        <td><img src="https://i.pravatar.cc/150?img=<?= mt_rand(1, 50) ?>" alt="avatar" width="50" /></td>
      </tr>
    <?php endforeach; ?>
    </table>
</section>
</body>
</html>