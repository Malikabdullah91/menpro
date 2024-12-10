<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Keripik</title>
    <link rel="icon" href="assets/icon.png" />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="gambar/images-removebg-preview.png" width="60px" alt="" />
            <span class="logo_name">Post-Keripik</span>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php" class="active"><i class="bx bx-grid-alt"></i><span class="links_name">Dashboard</span></a></li>
            <li><a href="admin.php"><i class="bx bx-user-circle"></i><span class="links_name">Admin</span></a></li>
            <li><a href="user.php"><i class="bx bxs-user-detail"></i><span class="links_name">User</span></a></li>
            <li><a href="ticket.php"><i class="bx bx-purchase-tag-alt"></i><span class="links_name">Ticket</span></a></li>
            <li><a href="transaction.php"><i class="bx bx-list-check"></i><span class="links_name">Transaction</span></a></li>
            <li><a href="login.php"><i class="bx bx-log-out"></i><span class="links_name">Log out</span></a></li>
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
            <h2 class="mt-4">Data Keripik</h2>
            <button class="btn btn-success mb-3"><i class="fas fa-print"></i> Cetak</button>
            <button class="btn btn-primary mb-3 ml-2" onclick="location.href='add_keripik.php'"><i class="fas fa-plus"></i> Tambah Data</button>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Poster</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $dsn = "mysql:host=localhost;dbname=keripik_db;charset=utf8mb4";
                $username = "root";
                $password = "";

                try {
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT poster, name, description, price, contact FROM tickets";
                    $stmt = $pdo->query($sql);

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td><img src='uploads/{$row['poster']}' width='50'></td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "<td>{$row['price']}</td>";
                            echo "<td>{$row['contact']}</td>";
                            echo "<td>
                                <button class='btn btn-warning btn-sm'>Edit</button>
                                <form method='POST' action='delete_keripik.php' style='display:inline-block;'>
                                <input type='hidden' name='name' value='{$row['name']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No data available</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                } finally {
                    $pdo = null;
                }
                ?>
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
    </script>
</body>
</html>
