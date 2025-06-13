<?php require_once(__DIR__ . '/../config/database.php'); ?>
<!DOCTYPE html>
<html lang="id">
<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Sekolah Impian Anda</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <a href="<?php echo BASE_URL; ?>index.php" class="logo">SekolahImpian</a>
            <nav class="main-nav">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>index.php">Beranda</a></li>
                    <li><a href="<?php echo BASE_URL; ?>tentang-kami.php">Tentang Kami</a></li>
                    <li><a href="<?php echo BASE_URL; ?>program-studi.php">Program Studi</a></li>
                    <li><a href="<?php echo BASE_URL; ?>kontak.php">Kontak</a></li>
                </ul>
            </nav>
            <div class="auth-links">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="<?php echo BASE_URL; ?>dashboard.php" class="btn btn-secondary">Dashboard</a>
                    <a href="<?php echo BASE_URL; ?>auth/logout.php" class="btn btn-primary">Logout</a>
                <?php else: ?>
                    <a href="<?php echo BASE_URL; ?>auth/login.php" class="btn btn-secondary">Login</a>
                    <a href="<?php echo BASE_URL; ?>auth/register.php" class="btn btn-primary">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main>