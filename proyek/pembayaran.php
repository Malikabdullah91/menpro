<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran - KonserKuy</title>
    <link rel="stylesheet" href="login.css" />
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <header class="main-header">
      <div class="header-content">
        <a href="#" class="logo">
          <img
            src="gambar/WhatsApp Image 2024-10-18 at 13.27.39(1).jpeg"
            alt="KonserKuy Logo"
            class="logo-image"
          />
          <span class="logo-text">Keripik</span>
        </a>
        <div class="search-bar">
          <input type="text" placeholder="Cari Konser..." />
          <button type="submit" class="search-button">
            <i data-feather="search"></i>
          </button>
        </div>
        <nav class="nav-menu">
          <a href="login.html" class="nav-link login-nav">Login</a>
          <a href="#" class="nav-link user-icon">
            <img
              src="gambar/WhatsApp Image 2024-10-18 at 13.27.39(2).jpeg"
              alt="User Profile"
              class="user-icon-img"
            />
          </a>
        </nav>
      </div>
    </header>

    <main class="login-page">
      <a href="air.html" class="back-link">
        <i data-feather="arrow-left-circle"></i>
      </a>
      <div class="login-box">
        <center>
          <h1 class="login-title">Pembayaran</h1>
        </center>
        <form class="login-form">
          <div class="form-group">
            <label for="email">Email<span class="required">*</span></label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              required
            />
          </div>
          <div class="form-group">
            <label for="nama">Nama<span class="required">*</span></label>
            <input
              type="text"
              id="nama"
              name="nama"
              placeholder="Nama"
              required
            />
          </div>
          <div class="form-group">
            <label for="date">Event<span class="required">*</span></label>
            <input
              type="text"
              id="date"
              name="date"
              placeholder="Konser Musik"
              required
              readonly
            />
          </div>
          <label for="payment_method">Pilih Metode Pembayaran:</label>
          <select id="payment_method" name="payment_method" required>
            <option value="">Pilih Metode Pembayaran</option>
            <option value="bank_transfer">Transfer Bank</option>
            <option value="e_wallet">QR-code</option></select
          ><br /><br />

          <div id="bank_transfer_form" style="display: none">
            <label for="bank">Pilih Bank:</label>
            <select id="bank" name="bank">
              <option value="bca">BCA</option>
              <option value="bri">BRI</option>
              <option value="mandiri">Mandiri</option>
              <option value="bni">BNI</option></select
            ><br /><br />
            <p>Transfer ke rekening: 1234567890 a.n. PT. Pembayaran</p>
          </div>

          <div id="e_wallet_form" style="display: none">
            <p>Scan kode QR untuk melakukan pembayaran</p>
            <center>
              <img src="gambar/Untitled.png" alt="QR Code" />
            </center>
          </div>
          <button type="button" id="pay-button" class="login-button">
            Bayar
          </button>
        </form>
      </div>
      <div id="receipt" class="receipt-box" style="display: none">
        <h2>Bukti Pembayaran</h2>
        <p><strong>Email:</strong> <span id="receipt-email"></span></p>
        <p><strong>Nama:</strong> <span id="receipt-nama"></span></p>
        <p><strong>Event:</strong> <span id="receipt-event"></span></p>
        <p>
          <strong>Metode Pembayaran:</strong> <span id="receipt-payment"></span>
        </p>
        <button>Download</button>
      </div>
    </main>
    <script>
      feather.replace();

      const paymentMethod = document.getElementById("payment_method");
      const bankTransferForm = document.getElementById("bank_transfer_form");
      const eWalletForm = document.getElementById("e_wallet_form");
      const payButton = document.getElementById("pay-button");
      const receiptBox = document.getElementById("receipt");

      paymentMethod.addEventListener("change", function () {
        bankTransferForm.style.display = "none";
        eWalletForm.style.display = "none";

        if (this.value === "bank_transfer") {
          bankTransferForm.style.display = "block";
        } else if (this.value === "e_wallet") {
          eWalletForm.style.display = "block";
        }
      });

      payButton.addEventListener("click", function () {
        const email = document.getElementById("email").value;
        const nama = document.getElementById("nama").value;
        const eventDate = document.getElementById("date").value;
        const paymentMethodSelected =
          paymentMethod.options[paymentMethod.selectedIndex].text;

        document.getElementById("receipt-email").textContent = email;
        document.getElementById("receipt-nama").textContent = nama;
        document.getElementById("receipt-event").textContent = eventDate;
        document.getElementById("receipt-payment").textContent =
          paymentMethodSelected;

        receiptBox.style.display = "block";
      });

      function printReceipt() {
        window.print();
      }
    </script>
  </body>
</html>
