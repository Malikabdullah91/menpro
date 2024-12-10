<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Transaction</title>
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
          <a href="dashboard.html">
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
          <a href=keripik.html">
            <i class="bx bx-purchase-tag-alt"></i>
            <span class="links_name">Keripik</span>
          </a>
        </li>
        <li>
          <a href="transaction.html" class="active">
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
        <h2 class="mt-4">Data Transaction</h2>
        <div class="d-flex align-items-center mb-3">
          <button class="btn btn-success mr-2">
            <i class="fas fa-print"></i> Cetak
          </button>
        </div>

        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Email</th>
              <th scope="col">Nama</th>
              <th scope="col">Event</th>
              <th scope="col">Metode Pembayaran</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2024-10-01</td>
              <td>user1@example.com</td>
              <td>User One</td>
              <td>Konser A</td>
              <td>QR Code</td>
              <td>
                <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
            <tr>
              <td>2024-10-02</td>
              <td>user2@example.com</td>
              <td>User Two</td>
              <td>Konser B</td>
              <td>Transfer Bank</td>
              <td>
                <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
          </tbody>
        </table>
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
      document
        .getElementById("eventFilter")
        .addEventListener("change", function () {
          const selectedEvent = this.value;
          const rows = document.querySelectorAll("tbody tr");
          rows.forEach((row) => {
            const eventCell = row.cells[3].innerText;
            if (selectedEvent && eventCell !== selectedEvent) {
              row.style.display = "none";
            } else {
              row.style.display = "";
            }
          });
        });
    </script>
  </body>
</html>
