<?php
require 'database.php';

session_start();

// Jika sudah login, langsung arahkan ke halaman admin
if (isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit();
}

$error = ''; // Variabel untuk menampilkan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Cek user berdasarkan username
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: admin.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } catch (PDOException $e) {
        $error = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Keripik</title>
    <link rel="stylesheet" href="login.css" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <header class="main-header">
        <div class="header-content">
            <a href="#" class="logo">
                <img src="gambar/images-removebg-preview.png" 
                     alt="KonserKuy Logo" class="logo-image" />
                <span class="logo-text">Post-Keripik</span>
            </a>
                   </div>
    </header>

    <main class="login-page">
        <div class="login-box">
            <center>
                <h1 class="login-title">Masuk</h1>
            </center>
            <form class="login-form" method="POST" action="">
                <div class="form-group">
                    <label for="username">Username<span class="required">*</span></label>
                    <input type="text" id="username" name="username" placeholder="Username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password<span class="required">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Password" required />
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
            <?php if ($error): ?>
                <p style="color: red;"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <div class="login-options">
                <a href="lupa-sandi.php" class="forgot-password-link">Lupa Sandi?</a>
                <a href="register.php" class="signup-link">Buat Akun</a>
            </div>
        </div>
    </main>
    <script>
        feather.replace();
    </script>
</body>
</html>
