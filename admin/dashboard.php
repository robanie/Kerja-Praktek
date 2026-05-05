<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$total_berita = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_berita FROM berita"));
$total_galeri = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_galeri FROM galeri"));
$total_prestasi = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_prestasi FROM prestasi"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f1f5f9;
            overflow-x: hidden;
        }

        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #1e3a8a, #2563eb);
            color: white;
            padding: 30px 20px;
            box-shadow: 5px 0 30px rgba(0,0,0,0.08);
            z-index: 1000;
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .sidebar-logo .logo-icon {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.15);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }

        .sidebar-logo h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar-logo small {
            opacity: 0.8;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            padding: 14px 16px;
            border-radius: 16px;
            margin-bottom: 10px;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateX(4px);
        }

        .content {
            margin-left: 270px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border-radius: 24px;
            padding: 20px 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h3 {
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .topbar p {
            margin: 0;
            color: #64748b;
        }

        .admin-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .stats-card {
            border-radius: 24px;
            padding: 25px;
            color: white;
            position: relative;
            overflow: hidden;
            transition: 0.3s;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-6px);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -30px;
            right: -30px;
        }

        .stats-icon {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .stats-card h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stats-card p {
            margin: 0;
            opacity: 0.9;
        }

        .bg-blue {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
        }

        .bg-green {
            background: linear-gradient(135deg, #16a34a, #22c55e);
        }

        .bg-orange {
            background: linear-gradient(135deg, #ea580c, #f97316);
        }

        .welcome-card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-top: 30px;
        }

        .welcome-card h4 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
        }

        .welcome-card p {
            color: #64748b;
            margin-bottom: 0;
        }

        @media (max-width: 991px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                border-radius: 0 0 30px 30px;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h4>Admin Panel</h4>
        <small>Website Sekolah</small>
    </div>

    <div class="sidebar-menu">
        <a href="dashboard.php" class="active">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="berita.php">
            <i class="bi bi-newspaper"></i> Kelola Berita
        </a>

        <a href="galeri.php">
            <i class="bi bi-images"></i> Kelola Galeri
        </a>

        <a href="prestasi.php">
            <i class="bi bi-trophy"></i> Kelola Prestasi
        </a>

        <a href="../index.php">
            <i class="bi bi-globe"></i> Lihat Website
        </a>

        <a href="../guru/absensi.php">
            <i class="bi bi-clipboard-check"></i> Absensi Siswa
        </a>

        <a href="logout.php">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

<div class="content">

    <div class="topbar">
        <div>
            <h3>Dashboard Admin</h3>
            <p>Kelola seluruh konten website sekolah dari sini.</p>
        </div>

        <div class="admin-box">
            <div class="admin-avatar">
                <i class="bi bi-person-fill"></i>
            </div>
            <div>
                <strong><?php echo $_SESSION['username']; ?></strong><br>
                <small class="text-muted">Admin</small>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
    <div class="stats-card bg-blue">
        <div class="stats-icon">
            <i class="bi bi-newspaper"></i>
        </div>
        <h3><?= $total_berita; ?></h3>
        <p>Total Berita</p>
    </div>
</div>

<div class="col-md-4">
    <div class="stats-card bg-green">
        <div class="stats-icon">
            <i class="bi bi-images"></i>
        </div>
        <h3><?= $total_galeri; ?></h3>
        <p>Total Galeri</p>
    </div>
</div>

<div class="col-md-4">
    <div class="stats-card bg-orange">
        <div class="stats-icon">
            <i class="bi bi-trophy"></i>
        </div>
        <h3><?= $total_prestasi; ?></h3>
        <p>Total Prestasi</p>
    </div>
</div>
    </div>

    <div class="welcome-card">
        <h4>Selamat Datang di Dashboard Admin 👋</h4>
        <p>
            Gunakan menu di samping untuk mengelola berita, galeri, prestasi, dan seluruh konten website sekolah.
        </p>
    </div>

</div>

</body>
</html>
```
