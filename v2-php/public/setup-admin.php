<?php
require_once __DIR__ . '/../config/database.php';

$username = 'admin';
$password_asli = 'Elitis_Admin'; 
$hash_password = password_hash($password_asli, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?) ON DUPLICATE KEY UPDATE password = ?");
$stmt->execute([$username, $hash_password, $hash_password]);

echo "Akun admin berhasil dibuat/diperbarui! <br>";
echo "Username: <b>admin</b> <br>";
echo "Password: <b>" . $password_asli . "</b> <br>";
echo "<a href='login.php'>Ke halaman Login</a>";