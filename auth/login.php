<?php
require_once(__DIR__ . '/../templates/header.php');

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Email dan password wajib diisi!";
    } else {
        $sql = "SELECT id, nama_lengkap, email, password, role FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verifikasi password dengan yang ada di database
            if (password_verify($password, $user['password'])) {
                // ---- PROSES BERHASIL ----
                // Buat session untuk menandai user sudah login
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nama'] = $user['nama_lengkap'];
                $_SESSION['user_role'] = $user['role'];
                
                // Pindahkan user ke halaman dashboard
                header('Location: ' . BASE_URL . 'dashboard.php');
                exit; // Pastikan skrip berhenti setelah redirect
            } else {
                // Jika password tidak cocok
                $error = "Email atau password salah!";
            }
        } else {
            // Jika email tidak ditemukan
            $error = "Email atau password salah!";
        }
    }
}
?>

<div class="auth-container">
    <div class="auth-form">
        <h2>Login Akun</h2>

        <?php if($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="switch-auth">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</div>

<?php require_once(__DIR__ . '/../templates/footer.php'); ?>