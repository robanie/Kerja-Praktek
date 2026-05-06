<!DOCTYPE html>
<html>
<head>
    <title>Profil Sekolah</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
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
            margin-bottom: 30px;
        }

        .card-custom {
            border: none;
            border-radius: 24px;
            background: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .kepsek-box {
            background: white;
            border-radius: 28px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        }

        .kepsek-img {
            width: 230px;
            height: 230px;
            object-fit: cover;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .org-card {
            background: white;
            border-radius: 24px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
            height: 100%;
        }

        .org-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .org-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid #eff6ff;
        }

        .visi-box {
            border-left: 5px solid #2563eb;
        }

        .footer {
            background: #0f172a;
            color: white;
            margin-top: 80px;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 45vh;
                padding: 40px 20px;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .kepsek-img {
                width: 180px;
                height: 180px;
                margin-bottom: 20px;
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

<section class="hero">
    <div class="hero-content container">
        <h1>Profil Sekolah</h1>
        <p>Mengenal lebih dekat visi, misi, dan struktur sekolah kami</p>
    </div>
</section>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="section-title">Sambutan Kepala Sekolah</h2>
        <p class="section-subtitle">Pesan dan harapan untuk seluruh siswa dan masyarakat.</p>
    </div>

    <div class="kepsek-box">
        <div class="row align-items-center g-4">
            <div class="col-lg-4 text-center">
                <img src="assets/img/01.webp" class="kepsek-img">
                <h5 class="mt-4 mb-1 fw-bold">Bahlil Lahadalia, S.E.</h5>
                <small class="text-muted">Kepala Sekolah</small>
            </div>

            <div class="col-lg-8">
                <p class="text-muted" style="line-height: 1.9;">
                    Assalamu’alaikum Wr. Wb.<br><br>
                    Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk mencetak generasi unggul, berprestasi, dan berakhlak mulia.
                    Website ini hadir untuk memberikan informasi terbaru mengenai sekolah, kegiatan, prestasi, dan berbagai program pendidikan.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mb-4">
        <h2 class="section-title">Visi & Misi</h2>
        <p class="section-subtitle">Landasan utama dalam membangun pendidikan berkualitas.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-custom visi-box p-4 h-100">
                <h4 class="fw-bold mb-3"><i class="bi bi-eye-fill text-primary"></i> Visi</h4>
                <p class="text-muted mb-0">Menjadi sekolah unggul dalam prestasi, karakter, teknologi, dan kreativitas.</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-custom p-4 h-100">
                <h4 class="fw-bold mb-3"><i class="bi bi-bullseye text-primary"></i> Misi</h4>
                <ul class="text-muted mb-0" style="line-height: 2;">
                    <li>Meningkatkan kualitas pendidikan dan pembelajaran</li>
                    <li>Mengembangkan potensi akademik dan non-akademik siswa</li>
                    <li>Membentuk karakter disiplin dan bertanggung jawab</li>
                    <li>Memanfaatkan teknologi dalam kegiatan belajar</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mb-4">
        <h2 class="section-title">Struktur Organisasi</h2>
        <p class="section-subtitle">Tim terbaik yang mendukung kemajuan sekolah.</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-lg-3 col-md-6">
            <div class="org-card">
                <img src="assets/img/01.webp" class="org-img">
                <h6 class="fw-bold">Kepala Sekolah</h6>
                <small class="text-muted">Bahlil Lahadalia, S.E.</small>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="org-card">
                <img src="assets/img/02.jpg" class="org-img">
                <h6 class="fw-bold">Wakil Kurikulum</h6>
                <small class="text-muted">Ir. H. Joko Widodo</small>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="org-card">
                <img src="assets/img/03.webp" class="org-img">
                <h6 class="fw-bold">Wakil Kesiswaan</h6>
                <small class="text-muted">Gibran Rakabuming Raka</small>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="org-card">
                <img src="assets/img/04.webp" class="org-img">
                <h6 class="fw-bold">Wakil Sarpras</h6>
                <small class="text-muted">Prabowo Subianto</small>
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