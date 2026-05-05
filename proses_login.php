<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// AMBIL DATA USER
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {

    // SIMPAN SESSION
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    // REDIRECT SESUAI ROLE
    if ($data['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } elseif ($data['role'] == 'guru') {
        header("Location: guru/dashboard.php");
    } else {
        header("Location: login.php?error=1");
    }

} else {
    header("Location: login.php?error=1");
}
?>