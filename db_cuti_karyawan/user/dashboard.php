<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'user') {
    header("Location: ../login.php");
}
$id_user = $_SESSION['id'];

$query = mysqli_query($conn, "SELECT * FROM cuti WHERE user_id=$id_user");
?>

<h2>Selamat datang, <?= $_SESSION['username']; ?></h2>
<a href="form_cuti.php">Ajukan Cuti</a> | <a href="../logout.php">Logout</a>

<h3>Riwayat Pengajuan Cuti</h3>
<table border="1">
    <tr>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Alasan</th>
        <th>Status</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['tanggal_mulai']; ?></td>
            <td><?= $row['tanggal_selesai']; ?></td>
            <td><?= $row['alasan']; ?></td>
            <td><?= $row['status']; ?></td>
        </tr>
    <?php } ?>
</table>
