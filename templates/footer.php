</main>
    <footer class="main-footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Nama Sekolah Impian Anda. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php
// Menutup koneksi database jika ada
if (isset($conn)) {
    $conn->close();
}
?>