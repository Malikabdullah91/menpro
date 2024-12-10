<?php
// Konfigurasi database
$dsn = "mysql:host=localhost;dbname=keripik_db;charset=utf8mb4";
$username = "root";
$password = "";

// Inisialisasi variabel error dan success
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses data yang dikirimkan dari form
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $poster = $_FILES['poster']['name'] ?? '';

    // Validasi input
    if ($name && $description && $price && $contact && $poster) {
        try {
            // Upload file poster
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($poster);
            if (move_uploaded_file($_FILES['poster']['tmp_name'], $uploadFile)) {
                // Simpan data ke database
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO tickets (poster, name, description, price, contact) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$poster, $name, $description, $price, $contact]);

                $success = 'Data berhasil ditambahkan.';
            } else {
                $error = 'Gagal mengunggah poster.';
            }
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    } else {
        $error = 'Semua kolom wajib diisi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Keripik</title>
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <img src="gambar/images-removebg-preview.png" width="60px" alt="" />
        <span class="logo_name">Post-Keripik</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.html" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin.html">
            <i class="bx bx-user-circle"></i>
            <span class="links_name">Admin</span>
          </a>
        </li>
        <li>
          <a href="user.html">
            <i class="bx bxs-user-detail"></i>
            <span class="links_name">User</span>
          </a>
        </li>
        <li>
          <a href="keripik.html">
            <i class="bx bx-purchase-tag-alt"></i>
            <span class="links_name">Keripik</span>
          </a>
        </li>
        <li>
          <a href="transaction.html">
            <i class="bx bx-list-check"></i>
            <span class="links_name">Transaction</span>
          </a>
        </li>
        <li>
          <a href="login.html">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="profile-details">
          <span class="admin_name">Admin</span>
        </div>
      </nav>

      <div class="home-content container">
        <h2 class="mt-4">Tambah Keripik</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nama Keripik</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="contact">Kontak</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        </form> 
      </div>
    </section>

    <script>
      document
        .querySelector(".custom-file-input")
        .addEventListener("change", function (e) {
          const fileName = e.target.files[0]
            ? e.target.files[0].name
            : "Pilih Gambar";
          const nextSibling = e.target.nextElementSibling;
          nextSibling.innerText = fileName;
        });

      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
      };
    </script>
  </body>
</html>