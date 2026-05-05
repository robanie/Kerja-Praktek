<?php
include 'config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Berita Sekolah</title>

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
            min-height: 45vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: white;
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
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #64748b;
            margin-bottom: 35px;
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
            height: 220px;
            object-fit: cover;
        }

        .berita-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 12px;
        }

        .btn-main {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .btn-main:hover {
            background: #1d4ed8;
            color: white;
        }

        .footer {
            background: #0f172a;
            color: white;
            margin-top: 80px;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 35vh;
                padding: 40px 20px;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .section-title {
                font-size: 1.7rem;
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
    <div class="hero-content container">
        <h1>Berita Sekolah</h1>
        <p>Informasi terbaru mengenai kegiatan, prestasi, dan pengumuman sekolah</p>
    </div>
</section>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="section-title">Daftar Berita</h2>
        <p class="section-subtitle">Ikuti berbagai informasi dan kegiatan terbaru dari sekolah kami.</p>
    </div>

    <div class="row g-4">

        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <div class="col-lg-4 col-md-6 d-flex">
            <div class="card card-custom w-100">

                <img src="assets/img/<?= $row['gambar']; ?>" class="img-fixed">

                <div class="card-body d-flex flex-column p-4">

                    <div class="berita-date">
                        <i class="bi bi-calendar-event"></i>
                        <?= $row['tanggal']; ?>
                    </div>

                    <h5 class="fw-bold mb-3"><?= $row['judul']; ?></h5>

                    <p class="text-muted flex-grow-1">
                        <?= substr($row['isi'],0,120); ?>...
                    </p>

                    <a href="detail_berita.php?id=<?= $row['id_berita']; ?>" class="btn btn-main btn-sm mt-auto">
                        Baca Selengkapnya
                    </a>

                </div>

            </div>
        </div>
        <?php } ?>

    </div>

</div>

<footer class="footer text-center p-4">
    <p class="mb-0">© 2026 Website Sekolah - All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>