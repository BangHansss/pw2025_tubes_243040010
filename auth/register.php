<?php
require_once(__DIR__ . '/../templates/header.php');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_lengkap = $conn->real_escape_string($_POST['nama_lengkap']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Validasi dasar
    if (empty($nama_lengkap) || empty($email) || empty($password)) {
        $error = "Semua field wajib diisi!";
    } elseif ($password !== $konfirmasi_password) {
        $error = "Konfirmasi password tidak cocok!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } else {
        // Cek apakah email sudah terdaftar
        $sql_check = "SELECT id FROM users WHERE email = '$email'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Simpan ke database
            $sql_insert = "INSERT INTO users (nama_lengkap, email, password) VALUES ('$nama_lengkap', '$email', '$hashed_password')";
            if ($conn->query($sql_insert) === TRUE) {
                $success = "Registrasi berhasil! Silakan <a href='login.php'>login</a>.";
            } else {
                $error = "Terjadi kesalahan: " . $conn->error;
            }
        }
    }
}
?>

<div class="auth-container">
    <div class="auth-form">
        <h2>Buat Akun Baru</h2>

        <?php if($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
        <?php if($success): ?><div class="alert alert-success"><?php echo $success; ?></div><?php endif; ?>

        <?php if(!$success): ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="konfirmasi_password">Konfirmasi Password</label>
                <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        <?php endif; ?>

        <p class="switch-auth">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</div>

<?php require_once(__DIR__ . '/../templates/footer.php'); ?>