<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM berkas WHERE id_berkas='$id'");
$row = mysqli_fetch_assoc($data);

if(file_exists("../assets/berkas/".$row['file_berkas'])){
    unlink("../assets/berkas/".$row['file_berkas']);
}

mysqli_query($koneksi, "DELETE FROM berkas WHERE id_berkas='$id'");

header("Location: berkas.php");
?>