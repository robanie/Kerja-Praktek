<?php
include 'config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$id'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Berita tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $row['judul']; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar {
            background: rgba(255,255,255,0.9) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            padding: 14px 0;
        }

        .navbar-brand {
            font-size: 1.7rem;
            font-weight: 700;
            color: #2563eb !important;
        }

        .nav-link {
            color: #334155 !important;
            font-weight: 500;
            margin-left: 10px;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #2563eb !important;
        }

        .hero {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            padding: 80px 20px 120px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            bottom: -80px;
            right: -80px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            max-width: 850px;
        }

        .berita-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-top: -60px;
            position: relative;
            z-index: 5;
            max-width: 950px;
            margin-left: auto;
            margin-right: auto;
        }

        .img-detail {
            width: 100%;
            height: 320px;
            object-fit: cover;
        }

        .content {
            line-height: 2;
            color: #475569;
            text-align: justify;
            font-size: 1rem;
        }

        .tanggal {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 500;
            margin-top: 10px;
        }

        .btn-back {
            background: white;
            color: #2563eb;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            color: #1d4ed8;
        }

        .footer {
            background: #0f172a;
            color: white;
            margin-top: 80px;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 60px 20px 100px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .berita-card {
                margin-top: -50px;
            }

            .img-detail {
                max-height: 280px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold">SekolahKu</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="profil.php" class="nav-link">Profil</a></li>
                <li><a href="berita.php" class="nav-link active">Berita</a></li>
                <li><a href="galeri.php" class="nav-link">Galeri</a></li>
                <li><a href="prestasi.php" class="nav-link">Prestasi</a></li>
                <li><a href="kontak.php" class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container hero-content">
        <a href="berita.php" class="btn-back mb-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Berita
        </a>

        <h1><?= $row['judul']; ?></h1>

        <div class="tanggal shadow-sm">
            <i class="bi bi-calendar-event"></i>
            <?= $row['tanggal']; ?>
        </div>
    </div>
</section>

<div class="container">

    <div class="berita-card">
        <img src="assets/img/<?= $row['gambar']; ?>" class="img-detail">

        <div class="p-4 p-md-5">
            <div class="content">
                <?= nl2br($row['isi']); ?>
            </div>
        </div>
    </div>

</div>

<footer class="footer text-center p-4">
    <p class="mb-0">© 2026 Website Sekolah - All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>