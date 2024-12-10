<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone_number = $_POST['tlp'];

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone_number) VALUES (:username, :email, :password, :phone_number)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->execute();
        header("Location: login.php");
    } catch (PDOException $e) {
        $error = "Registration failed! " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Keripik</title>
    <link rel="stylesheet" href="login.css" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<header class="main-header">
    <div class="header-content">
        <a href="#" class="logo">
            <img src="gambar/images-removebg-preview.png" alt="KonserKuy Logo" class="logo-image" />
            <span class="logo-text">Post-Keripik</span>
        </a>
    </div>
</header>

<main class="login-page">
    <div class="login-box">
        <center>
            <h1 class="login-title">Register</h1>
        </center>
        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="username">Username<span class="required">*</span></label>
                <input type="text" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="form-group">
                <label for="email">Email<span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>
            <div class="form-group">
                <label for="password">Password<span class="required">*</span></label>
                <input type="password" id="pswd" name="password" placeholder="Password" required />
            </div>
            <div class="form-group">
                <label for="tlp">No Telepon<span class="required">*</span></label>
                <input type="text" inputmode="numeric" id="tlp" name="tlp" placeholder="No Telepon" required />
            </div>
            <button type="submit" class="login-button">Register</button>
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </div>
</main>
<script>
    feather.replace();
</script>
</body>
</html>
