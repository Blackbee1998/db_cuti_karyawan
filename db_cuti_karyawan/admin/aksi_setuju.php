// aksi_setujui.php
<?php
include "../config/koneksi.php";
$id = $_GET['id'];
mysqli_query($conn, "UPDATE cuti SET status='disetujui' WHERE id=$id");
header("Location: dashboard.php");
?>
