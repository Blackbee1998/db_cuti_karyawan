<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}

$query = mysqli_query($conn, "SELECT cuti.*, akun.username FROM cuti JOIN akun ON akun.id=cuti.user_id");
?>

<h2>Halo Admin, <?= $_SESSION['username']; ?></h2>
<a href="../logout.php">Logout</a>

<h3>Pengajuan Cuti</h3>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Alasan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['username']; ?></td>
            <td><?= $row['tanggal_mulai']; ?></td>
            <td><?= $row['tanggal_selesai']; ?></td>
            <td><?= $row['alasan']; ?></td>
            <td><?= $row['status']; ?></td>
            <td>
                <a href="aksi_setuju.php?id=<?= $row['id']; ?>">Setujui</a> |
                <a href="aksi_tolak.php?id=<?= $row['id']; ?>">Tolak</a>
            </td>
        </tr>
    <?php } ?>
</table>
