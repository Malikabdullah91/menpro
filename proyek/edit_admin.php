<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Admin</title>
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
          <span class="admin_name">KonserKuy Admin</span>
        </div>
      </nav>

      <div class="home-content container">
        <h2 class="mt-4">Edit Admin</h2>
        <form id="editAdminForm">
          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Masukkan username"
              required
              value="username_existing"
            />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Masukkan email"
              required
              value="email_existing@example.com"
            />
          </div>
          <button type="submit" class="btn btn-primary">
            Simpan Perubahan
          </button>
          <button
            type="button"
            class="btn btn-secondary ml-2"
            onclick="window.location.href='admin.html'"
          >
            Batal
          </button>
        </form>
      </div>
    </section>

    <script>
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
