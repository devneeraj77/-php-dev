<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- <form method="post" action="request.php">
        Name: <input type="text" name="fname">
        <input type="submit">
    </form> -->
    <?php
$url = 'https://reqres.in/api/users?page=1';
$response = file_get_contents($url);
$data = json_decode($response, true);
$users = $data['data'];
?>

  <h2 style="text-align: center;">User Table</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Avatar</th>

    </tr>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td><?= htmlspecialchars($user['first_name']) ?></td>
        <td><?= htmlspecialchars($user['last_name']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><img src="<?= htmlspecialchars($user['avatar']) ?>" alt="avatar" width="50" /></td>
      </tr>
    <?php endforeach; ?>



</body>

</html>