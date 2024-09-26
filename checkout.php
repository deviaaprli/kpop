<?php
include 'script.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Merch Kpop Store</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <header class="header">
        <div class="logoContent">
            <a href="#" class="logo"><img src="images/logo.png" alt="Logo"></a>
            <h1 class="logoName">Merch Kpop</h1>
        </div>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#aboutus">about us</a>
            <a href="#popular">popular</a>
            <a href="#product">product</a>
            <a href="#contact">contact</a>
        </nav>
        <div class="icon">
            <i class="fas fa-search" id="search"></i>
            <i class="fas fa-bars" id="menu-bar"></i>
            <i class="fas fa-shopping-cart" id="cart-btn"><span id="cart-count">0</span></i>
        </div>
        <div class="search">
            <input type="search" placeholder="search...">
        </div>
        <div id="shopping-cart" class="shopping-cart">
            <h2>My Cart</h2>
            <div id="cart">
                <div class="cart-item"></div>
            </div>
            <hr>
            <h3 id="total-price">Total Price: Rp.0</h3>
            <div>
                <button class="co-btn" onclick="window.location.href='checkout.php'">Checkout</button>
            </div>
        </div>
    </header>

    <section class="checkout-container">
        <h2>Checkout</h2>
        <form id="checkout-form" action="process_checkout.php" method="POST">
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">No. HP</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="courier">Pilih Ekspedisi</label>
                <select id="courier" name="courier" required>
                    <option value="JNE">JNE</option>
                    <option value="J&T">J&T</option>
                    <option value="Tiki">Tiki</option>
                    <option value="SiCepat">SiCepat</option>
                    <option value="Cargo">Cargo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment">Metode Pembayaran</label>
                <select id="payment" name="payment" required onchange="togglePaymentOptions()">
                    <option value="default">Pilih Metode Pembayaran</option>
                    <option value="bank">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="KartuKredit">Kartu Kredit</option>
                </select>
            </div>
            <div class="form-group" id="bank-options" style="display: none;">
                <label for="bank">Pilih Bank</label>
                <select id="bank" name="bank">
                    <option value="BCA">BCA</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="SeaBank">SeaBank</option>
                </select>
            </div>
            <div class="form-group" id="ewallet-options" style="display: none;">
                <label for="ewallet">Pilih E-Wallet</label>
                <select id="ewallet" name="ewallet">
                    <option value="Ovo">Ovo</option>
                    <option value="Gopay">Gopay</option>
                    <option value="ShopeePay">ShopeePay</option>
                </select>
            </div>
            <div class="form-group" id="credit-card-field" style="display: none;">
                <label for="credit-card-number">Nomor Kartu Kredit</label>
                <input type="text" id="credit-card-number" name="credit_card_number" minlength="10" maxlength="10">
            </div>
            <div class="form-group">
                <button type="submit" onclick="validateForm()">Submit</button>
            </div>
        </form>
        <div id="responseMessage" style="display: none;"></div>
        <div class="summary">
            <h3>Summary</h3>
            <p>Total Harga Barang: <span id="total-price-summary">Rp.0</span></p>
            <p>Biaya Pelayanan: <span id="service-fee">Rp.5000</span></p>
            <p>Ongkos Kirim: <span id="shipping-fee">Rp.0</span></p>
            <p>Total yang Harus Dibayar: <span id="total-payment">Rp.0</span></p>
        </div>
    </section>

    <!-- Custom JS -->
    <script src="script.php"></script>
    <script>
        function togglePaymentOptions() {
            var paymentMethod = document.getElementById("payment").value;
            document.getElementById("bank-options").style.display = "none";
            document.getElementById("ewallet-options").style.display = "none";
            document.getElementById("credit-card-field").style.display = "none";

            if (paymentMethod === "bank") {
                document.getElementById("bank-options").style.display = "block";
            } else if (paymentMethod === "ewallet") {
                document.getElementById("ewallet-options").style.display = "block";
            } else if (paymentMethod === "KartuKredit") {
                document.getElementById("credit-card-field").style.display = "block";
            }
        }

        function validateForm() {}
    </script>
</body>

</html>