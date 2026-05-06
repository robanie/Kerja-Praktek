<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_materi='$id'");
$row = mysqli_fetch_assoc($data);

if(file_exists("../assets/materi/".$row['file_materi'])){
    unlink("../assets/materi/".$row['file_materi']);
}

mysqli_query($koneksi, "DELETE FROM materi WHERE id_materi='$id'");

header("Location: materi.php");
?>