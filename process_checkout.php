<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "kpop_store";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$courier = $_POST['courier'];
$payment = $_POST['payment'];
$credit_card_number = isset($_POST['credit_card_number']) ? $_POST['credit_card_number'] : "";

// Menyimpan data ke database menggunakan prepared statements
$stmt = $conn->prepare("INSERT INTO checkout (email, name, phone, address, courier, payment, credit_card_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $email, $name, $phone, $address, $courier, $payment, $credit_card_number);

if ($stmt->execute()) {
    echo "Pesanan Anda berhasil disimpan.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
