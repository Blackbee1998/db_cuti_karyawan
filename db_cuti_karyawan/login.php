<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['username'] = $data['username'];

        if ($data['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
    } else {
        echo "Login gagal!";
    }
}
?>

<form method="post">
    <h2>Login Cuti Karyawan</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button name="login">Login</button>
</form>

<p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
