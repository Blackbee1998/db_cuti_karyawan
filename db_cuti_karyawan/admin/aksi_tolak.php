// aksi_tolak.php
<?php
include "../config/koneksi.php";
$id = $_GET['id'];
mysqli_query($conn, "UPDATE cuti SET status='ditolak' WHERE id=$id");
header("Location: dashboard.php");
?>