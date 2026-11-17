<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/Auth.php';

$auth = new Auth($pdo);
$error = '';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($auth->login($username, $password)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Warehouse Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/login-style.css">
</head>
<body>

    <div class="login-left">
        <i class="fas fa-boxes brand-icon"></i>
        <h1>Gudang System</h1>
        <p>Kelola inventaris gudang Anda dengan mudah, cepat, dan aman.</p>
    </div>

    <div class="login-right">
        <div class="login-form-container">
            <h2>Masuk ke Akun</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-danger py-2" style="font-size: 0.9rem;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control-custom" required placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control-custom" required placeholder="••••••••">
                </div>
                <button type="submit" class="btn-custom">Sign In</button>
            </form>
        </div>
    </div>

</body>
</html>