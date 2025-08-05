<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch users</title>
</head>
<body>
    <?php
    $url = "https://reqres.in/api/users?page=2";
  $response = file_get_contents($url);
  if ($response === FALSE) {
    die('Error fetching data');
  }

  $data = json_decode($response, true);

  echo '<pre>';
   print_r($data);
  echo '</pre>';
?>

<!-- <table>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Avatar</th>

    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id'])?>
             
            </td>
            <td><?= htmlspecialchars($user['address'])?></td>
            <td><?= htmlspecialchars($user['phone'])?></td>
        </tr>
    <?php endforeach ?>
</table> -->
</body>
</html>