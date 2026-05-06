<?php
include 'config/koneksi.php';

$berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 3");
$galeri = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 4");
$prestasi = mysqli_query($koneksi, "SELECT * FROM prestasi ORDER BY id_prestasi DESC LIMIT 3");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sekolah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
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
            overflow-x: hidden;
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
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
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
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 700px;
            margin: auto;
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .btn-main {
            background: white;
            color: #2563eb;
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .stats {
            background: white;
            border-radius: 24px;
            padding: 40px 20px;
            margin-top: -60px;
            position: relative;
            z-index: 5;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .stats h2 {
            color: #2563eb;
            font-weight: 700;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .card-custom {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .img-fixed {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .gallery-img {
            overflow: hidden;
            border-radius: 20px;
        }

        .gallery-img img {
            transition: 0.4s;
        }

        .gallery-img:hover img {
            transform: scale(1.08);
        }

        .footer {
            background: #0f172a;
            color: white;
            margin-top: 80px;
        }

        footer a {
            color: #cbd5e1;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.4rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .stats {
                margin-top: -40px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">SekolahKu</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li><a href="index.php" class="nav-link active">Home</a></li>
                <li><a href="profil.php" class="nav-link">Profil</a></li>
                <li><a href="berita.php" class="nav-link">Berita</a></li>
                <li><a href="galeri.php" class="nav-link">Galeri</a></li>
                <li><a href="prestasi.php" class="nav-link">Prestasi</a></li>
                <li><a href="materi.php" class="nav-link">Materi</a></li>
                <li><a href="berkas.php" class="nav-link">Berkas</a></li>
                <li><a href="kontak.php" class="nav-link">Kontak</a></li>

            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container hero-content text-center">
    <div class="container">
        
        <h1>Sekolah Modern Untuk Generasi Hebat</h1>
        <p>
            Lingkungan belajar modern, guru profesional, dan fasilitas lengkap untuk mendukung masa depan siswa.
        </p>
        <a href="profil.php" class="btn btn-main">
            <i class="bi bi-mortarboard-fill"></i> Lihat Profil Sekolah
        </a>
    </div>
</section>

<div class="container py-5" style="position:relative; z-index:2;">

    <!-- STATISTIK -->
    <div class="stats text-center">
        <div class="row g-4">
        <div class="row g-4">
            <div class="col-md-3 mb-4 mb-md-0">
                <h2>1.200+</h2>
                <p>Siswa Aktif</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2>80+</h2>
                <p>Guru Profesional</p>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <h2>35+</h2>
                <p>Prestasi Sekolah</p>
            </div>
            <div class="col-md-3">
                <h2>20+</h2>
                <p>Ekstrakurikuler</p>
            </div>
        </div>
    </div>

    <!-- BERITA -->
    <h3 class="section-title mt-5">Berita Terbaru</h3>
    <p class="section-subtitle">Informasi terbaru, kegiatan sekolah, dan berbagai pengumuman penting.</p>
    <div class="row mt-4">
        <?php while($row = mysqli_fetch_assoc($berita)) { ?>
        <div class="col-lg-4 col-md-6 mb-4 d-flex">
            <div class="card card-custom w-100">
                <img src="assets/img/<?= $row['gambar']; ?>" class="img-fixed">
                <div class="card-body d-flex flex-column">
                    <small class="text-primary mb-2"><i class="bi bi-calendar-event"></i> Berita Sekolah</small>
                    <h5 class="fw-bold"><?= $row['judul']; ?></h5>
                    <p class="text-muted flex-grow-1"><?= substr($row['isi'],0,100); ?>...</p>
                    <a href="detail_berita.php?id=<?= $row['id_berita']; ?>" class="btn btn-main btn-sm mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <a href="berita.php" class="btn btn-outline-primary rounded-pill px-4">
        Lihat Semua Berita
    </a>

    <!-- GALERI -->
    <h3 class="section-title mt-5">Galeri Sekolah</h3>
    <p class="section-subtitle">Dokumentasi kegiatan, fasilitas, dan suasana sekolah yang inspiratif.</p>
    <div class="row mt-4">
        <?php while($g = mysqli_fetch_assoc($galeri)) { ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="gallery-img shadow-sm">
                <img src="assets/img/<?= $g['gambar']; ?>" class="img-fixed w-100">
            </div>
        </div>
        <?php } ?>
    </div>

    <a href="galeri.php" class="btn btn-outline-primary rounded-pill px-4">
        Lihat Semua Galeri
    </a>

    <!-- PRESTASI -->
    <h3 class="section-title mt-5">Prestasi Sekolah</h3>
    <p class="section-subtitle">Berbagai pencapaian siswa dan sekolah di tingkat lokal maupun nasional.</p>
    <div class="row mt-4">
        <?php while($p = mysqli_fetch_assoc($prestasi)) { ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card card-custom prestasi-card p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:55px;height:55px;">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-1 fw-bold"><?= $p['nama_prestasi']; ?></h5>
                        <small class="text-muted"><?= $p['tahun']; ?> - <?= $p['tingkat']; ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <a href="prestasi.php" class="btn btn-outline-primary rounded-pill px-4">
        Lihat Semua Prestasi
    </a>
</div>

<!-- FOOTER -->
<footer class="footer text-center p-4">
    <p class="mb-0">© 2026 Website Sekolah - All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>