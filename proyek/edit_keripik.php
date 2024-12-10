<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit keripik</title>
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
            <span class="links_name">keripik</span>
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
        <h2 class="mt-4">Edit keripik</h2>
        <form id="editTicketForm">
          <div class="form-group">
            <label for="poster">Poster</label>
            <div class="custom-file">
              <input
                type="file"
                class="custom-file-input"
                id="poster"
                accept="image/*"
                required
                onchange="updateFileName()"
              />
              <label class="custom-file-label" for="poster">Pilih Gambar</label>
            </div>
            <span id="file-name" class="mt-2 d-block"></span>
            <!-- Tempat untuk menampilkan nama file -->
          </div>
          <div class="form-group">
            <label for="ticketName">Nama Ticket</label>
            <input
              type="text"
              class="form-control"
              id="ticketName"
              placeholder="Masukkan nama ticket"
              required
              value="Nama Ticket yang Ada"
            />
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea
              class="form-control"
              id="description"
              rows="3"
              placeholder="Masukkan deskripsi"
              required
            >
Deskripsi yang Ada</textarea
            >
          </div>
          <div class="form-group">
            <label for="price">Harga</label>
            <input
              type="text"
              inputmode="numeric"
              class="form-control"
              id="price"
              placeholder="Masukkan harga"
              required
              value="100000"
            />
          </div>
          <div class="form-group">
            <label for="contact">Kontak</label>
            <input
              type="tel"
              class="form-control"
              id="contact"
              placeholder="Masukkan telepon atau email"
              required
              value="081234567890"
            />
          </div>
          <button type="submit" class="btn btn-primary">
            Simpan Perubahan
          </button>
          <button
            type="button"
            class="btn btn-secondary ml-2"
            onclick="window.location.href='ticket.html'"
          >
            Batal
          </button>
        </form>
      </div>
    </section>

    <script>
      // Update file name in the label
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
