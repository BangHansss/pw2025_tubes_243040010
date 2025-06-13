<?php require_once(__DIR__ . '/templates/header.php'); ?>

<div class="page-header">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Kami siap mendengar pertanyaan, masukan, dan ide-ide dari Anda.</p>
    </div>
</div>

<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <p>Jangan ragu untuk mengunjungi kami atau menghubungi melalui detail di bawah ini.</p>
                <ul class="info-list">
                    <li><strong>📍 Alamat:</strong><br>Jl. Pendidikan No. 123, Kota Harapan, Indonesia</li>
                    <li><strong>📞 Telepon:</strong><br>(021) 123-4567</li>
                    <li><strong>📧 Email:</strong><br>info@sekolahimpian.sch.id</li>
                    <li><strong>🕒 Jam Operasional:</strong><br>Senin - Jumat, 08:00 - 16:00 WIB</li>
                </ul>
            </div>
            <div class="contact-form-wrapper">
                 <form action="#" method="POST" class="auth-form contact-form">
                    <h2>Kirim Pesan</h2>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Anda</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Anda</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="6" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once(__DIR__ . '/templates/footer.php'); ?>