<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sekolah";

$koneksi = mysqli_connect($host, $user, $pass, $db);

//cek koneksi
if (!$koneksi) {
    die("koneksi gagal: ". mysqli_connect_error());
}
?>