<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
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

      <div class="home-content">
        <h1>Selamat Datang Admin</h1>
        <div class="container mt-4">
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-user-shield fa-2x mr-3"></i>
                    <div>
                      <h5 class="card-title">Admin</h5>
                      <p class="card-text">Total Admin: 5</p>
                    </div>
                  </div>
                  <a href="admin.html" class="btn btn-light">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-success">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-2x mr-3"></i>
                    <div>
                      <h5 class="card-title">User</h5>
                      <p class="card-text">Total User: 150</p>
                    </div>
                  </div>
                  <a href="user.html" class="btn btn-light">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-danger">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-ticket-alt fa-2x mr-3"></i>
                    <div>
                      <h5 class="card-title">Ticket</h5>
                      <p class="card-text">Total Ticket: 300</p>
                    </div>
                  </div>
                  <a href="ticket.html" class="btn btn-light">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card text-white bg-warning">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-file-invoice-dollar fa-2x mr-3"></i>
                    <div>
                      <h5 class="card-title">Transaction</h5>
                      <p class="card-text">Total Transaction: 100</p>
                    </div>
                  </div>
                  <a href="transaction.html" class="btn btn-light"
                    >Lihat Detail</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
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
