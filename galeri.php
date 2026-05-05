<?php
include 'config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Galeri Sekolah</title>

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

        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            background: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
            height: 100%;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .gallery-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: 0.4s;
        }

        .gallery-card:hover img {
            transform: scale(1.08);
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(15,23,42,0.85), transparent);
            color: white;
            padding: 30px 20px 15px;
            opacity: 0;
            transition: 0.3s;
        }

        .gallery-card:hover .overlay {
            opacity: 1;
        }

        .overlay p {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 500;
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

            .gallery-card img {
                height: 220px;
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
                <li><a href="berita.php" class="nav-link">Berita</a></li>
                <li><a href="galeri.php" class="nav-link active">Galeri</a></li>
                <li><a href="prestasi.php" class="nav-link">Prestasi</a></li>
                <li><a href="kontak.php" class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="hero-content container">
        <h1>Galeri Sekolah</h1>
        <p>Dokumentasi kegiatan, prestasi, dan suasana sekolah kami</p>
    </div>
</section>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="section-title">Galeri Foto</h2>
        <p class="section-subtitle">Berbagai momen dan kegiatan terbaik yang ada di sekolah.</p>
    </div>

    <div class="row g-4">

        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6">

            <a href="assets/img/<?= $row['gambar']; ?>" target="_blank" class="text-decoration-none">
                <div class="gallery-card">
                    <img src="assets/img/<?= $row['gambar']; ?>">

                    <div class="overlay">
                        <p><?= $row['judul']; ?></p>
                    </div>
                </div>
            </a>

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