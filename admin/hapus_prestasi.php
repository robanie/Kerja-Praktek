<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT gambar FROM prestasi WHERE id_prestasi='$id'");
$row = mysqli_fetch_assoc($data);

unlink("../assets/img/".$row['gambar']);

mysqli_query($koneksi,"DELETE FROM prestasi WHERE id_prestasi='$id'");

header("Location: prestasi.php");
?>