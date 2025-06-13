<?php
// Mulai session di setiap halaman
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi Database
$db_host = 'localhost';
$db_user = 'root'; // Ganti dengan username database Anda
$db_pass = '';     // Ganti dengan password database Anda
$db_name = 'db_sekolah';

// Buat Koneksi
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Cek Koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Set base URL agar path selalu benar
define('BASE_URL', 'http://localhost/PW2025_TUBES_243040010/'); // Ganti sesuai path folder Anda
?>