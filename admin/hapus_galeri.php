<?php
include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM galeri WHERE id_galeri='$id'");

header("Location: galeri.php");
?>