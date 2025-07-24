<?php
include "config/koneksi.php";

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // default semua pendaftar adalah user

    // Cek username sudah dipakai atau belum
    $cek = mysqli_query($conn, "SELECT * FROM akun WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "❌ Username sudah digunakan!";
    } else {
        // Simpan akun baru
        mysqli_query($conn, "INSERT INTO akun (username, password, role) 
                             VALUES ('$username', '$password', '$role')");
        echo "✅ Akun berhasil dibuat. Silakan login.";
    }
}
?>

<h2>Form Registrasi Akun Karyawan</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit" name="daftar">Daftar</button>
</form>
<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
