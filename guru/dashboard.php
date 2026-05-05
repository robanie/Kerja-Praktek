<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f1f5f9;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, #16a34a, #22c55e);
            color: white;
            padding: 30px 20px;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border-radius: 20px;
            padding: 20px 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .welcome-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Panel Guru</h4>

    <a href="dashboard.php" class="active">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="absensi.php">
        <i class="bi bi-calendar-check"></i> Absensi
    </a>

    <a href="rekap.php">
        <i class="bi bi-file-earmark-text"></i> Rekap Absensi
    </a>

    <a href="logout.php">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

<div class="content">
    <div class="topbar">
        <h3>Dashboard Guru</h3>
        <p>Selamat datang, <?= $_SESSION['username']; ?></p>
    </div>

    <div class="welcome-card">
        <h4>Halo <?= $_SESSION['username']; ?> 👋</h4>
        <p>Silakan gunakan menu di samping untuk mengelola absensi siswa.</p>
    </div>
</div>

</body>
</html>