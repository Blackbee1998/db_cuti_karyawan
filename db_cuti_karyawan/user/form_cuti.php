<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'user') {
    header("Location: ../login.php");
}

if (isset($_POST['ajukan'])) {
    $uid = $_SESSION['id'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
    $alasan = $_POST['alasan'];

    mysqli_query($conn, "INSERT INTO cuti (user_id, tanggal_mulai, tanggal_selesai, alasan) 
                         VALUES ('$uid', '$mulai', '$selesai', '$alasan')");
    header("Location: dashboard.php");
}
?>

<h2>Form Pengajuan Cuti</h2>
<form method="post">
    Tanggal Mulai: <input type="date" name="mulai"><br>
    Tanggal Selesai: <input type="date" name="selesai"><br>
    Alasan: <textarea name="alasan"></textarea><br>
    <button name="ajukan">Ajukan</button>
</form>
