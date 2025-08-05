<?php session_start();
$host = "localhost"; 
$dbname = "fligzyxx_fixitfusion";
$username = "fligzyxx_fixitfusion"; 
$password = "Uc:q]&^5.MU>"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Data is connected successfully!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
