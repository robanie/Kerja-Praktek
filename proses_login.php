<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// AMBIL DATA USER (HANYA ADMIN)
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='admin'");
$data = mysqli_fetch_assoc($query);

if ($data) {

    // SIMPAN SESSION
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    // REDIRECT KE ADMIN SAJA
    header("Location: admin/dashboard.php");

} else {
    header("Location: login.php?error=1");
}
?>