<!DOCTYPE html>
<html>
<head>
    <title>Kontak Sekolah</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .card-custom {
            background: white;
            border: none;
            border-radius: 24px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
            height: 100%;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
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

        .form-control {
            border-radius: 14px;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.15rem rgba(37,99,235,0.15);
        }

        .btn-main {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-main:hover {
            background: #1d4ed8;
            color: white;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
        }

        .info-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            color: white;
            font-size: 18px;
            margin-right: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            transform: translateY(-4px);
        }

        .ig { background: #E1306C; }
        .fb { background: #1877F2; }
        .wa { background: #25D366; }

        iframe {
            border-radius: 18px;
            margin-top: 20px;
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
                <li><a href="galeri.php" class="nav-link">Galeri</a></li>
                <li><a href="prestasi.php" class="nav-link">Prestasi</a></li>
                <li><a href="kontak.php" class="nav-link active">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="hero-content container">
        <h1>Kontak Sekolah</h1>
        <p>Hubungi kami untuk informasi lebih lanjut mengenai sekolah</p>
    </div>
</section>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="section-title">Hubungi Kami</h2>
        <p class="section-subtitle">Kami siap membantu dan menjawab pertanyaan Anda.</p>
    </div>

    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card-custom p-4 p-md-5">
                <h4 class="fw-bold mb-4">Kirim Pesan</h4>

                <form method="POST">
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" required>
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="text" name="subjek" class="form-control mb-3" placeholder="Subjek" required>
                    <textarea name="pesan" class="form-control mb-3" placeholder="Pesan" rows="5" required></textarea>

                    <button name="kirim" class="btn btn-main">
                        <i class="bi bi-send-fill"></i> Kirim Pesan
                    </button>
                </form>

                <?php
                if(isset($_POST['kirim'])){
                    echo "<div class='alert alert-success mt-4 rounded-4'>Pesan berhasil dikirim!</div>";
                }
                ?>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-custom p-4 p-md-5">
                <h4 class="fw-bold mb-4">Informasi Sekolah</h4>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <strong>Alamat</strong><br>
                        <span class="text-muted">Jl. Contoh No.123</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                    <div>
                        <strong>Email</strong><br>
                        <span class="text-muted">sekolah@email.com</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                    <div>
                        <strong>Telepon</strong><br>
                        <span class="text-muted">08123456789</span>
                    </div>
                </div>

                <h5 class="fw-bold mt-4 mb-3">Media Sosial</h5>

                <div class="social-icons mb-4">
                    <a href="https://instagram.com/" target="_blank" class="ig">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://facebook.com/" target="_blank" class="fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="https://wa.me/628123456789" target="_blank" class="wa">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>

                <iframe 
                    src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%" 
                    height="250" 
                    style="border:0;">
                </iframe>
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