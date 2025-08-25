<?php require_once('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$stmt = $conn->query('SELECT * FROM products ORDER BY id DESC');
$rows=$stmt->fetchAll();
?>


<table width='30%' >
            <td>Product Name</td>
            <td>Product Price </td> 
        </tr>
        <?php 
        foreach($rows as $row) {         
            echo "<tr>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['price']."</td>"; 
                    
        }
        ?>
</body>
</html>