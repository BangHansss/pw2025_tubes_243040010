<?php
require_once(__DIR__ . '/templates/header.php');

// --- BLOK PENGAMAN ---
// Jika kartu akses 'user_id' tidak ada, paksa keluar ke halaman login
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit; // Hentikan eksekusi, jangan tampilkan sisa halaman
}
// --- AKHIR BLOK PENGAMAN ---

// Kode ini hanya akan berjalan jika user SUDAH LOGIN dengan benar
$nama_pengguna = htmlspecialchars($_SESSION['user_nama']); // Baris 17 (sekarang aman)
$role_pengguna = htmlspecialchars($_SESSION['user_role']); // Baris 18 (sekarang aman)
?>

<div class="page-header">
    <div class="container">
        <h1>Dashboard Pengguna</h1>
        <p>Selamat datang kembali, <?php echo $nama_pengguna; ?>!</p>
    </div>
</div>

<section class="section">
    <div class="container">
        
        <div class="dashboard-grid">

            <div class="dashboard-main">
                <h2 class="dashboard-title">Aksi Cepat</h2>
                <div class="quick-actions-grid">
                    <a href="#" class="dashboard-card">
                        <div class="card-icon"><i class="fas fa-book"></i></div>
                        <h3>Lihat Nilai</h3>
                        <p>Akses rapor dan nilai semester Anda.</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
<h3>Jadwal Pelajaran</h3>
                        <p>Lihat jadwal kelas mingguan Anda.</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
<h3>Jadwal Pelajaran</h3>
                        <p>Cek informasi terbaru dari sekolah.</p>
                    </a>
                    <a href="#" class="dashboard-card">
                        <div class="card-icon">💸</div>
                        <h3>Status Pembayaran</h3>
                        <p>Lihat riwayat dan status SPP.</p>
                    </a>
                </div>
            </div>

            <aside class="dashboard-sidebar">
                <div class="profile-card">
                    <h2 class="dashboard-title">Profil Saya</h2>
                    <img src="<?php echo BASE_URL; ?>assets/images/default-avatar.png" alt="Avatar Pengguna" class="profile-avatar">
                    <h3 class="profile-name"><?php echo $nama_pengguna; ?></h3>
                    <p class="profile-role"><?php echo ucfirst($role_pengguna); ?></p>
                    <hr class="profile-divider">
                    <a href="#" class="btn btn-secondary profile-button">Ubah Profil</a>
                    <a href="<?php echo BASE_URL; ?>auth/logout.php" class="btn btn-primary profile-button logout">Logout</a>
                </div>
            </aside>

        </div>

    </div>
</section>

<?php require_once(__DIR__ . '/templates/footer.php'); ?>