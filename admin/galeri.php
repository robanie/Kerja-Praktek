<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Galeri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f1f5f9;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        .page-title h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #64748b;
            margin: 0;
        }

        .btn-upload {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 10px 20px rgba(37,99,235,0.2);
        }

        .gallery-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.3s;
            height: 100%;
            border: none;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .gallery-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .gallery-body {
            padding: 18px;
            text-align: center;
        }

        .gallery-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 15px;
            min-height: 48px;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-2px);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }

            .gallery-img {
                height: 180px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

<a href="dashboard.php" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
</a>

<div class="page-header">
    <div class="page-title">
        <h2>Kelola Galeri</h2>
        <p>Kelola seluruh foto dan dokumentasi kegiatan sekolah.</p>
    </div>

    <a href="tambah_galeri.php" class="btn btn-upload">
        <i class="bi bi-cloud-arrow-up-fill"></i> Upload Foto
    </a>
</div>

<div class="row g-4">

<?php while($row = mysqli_fetch_assoc($data)) { ?>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="gallery-card">

            <img src="../assets/img/<?= $row['gambar']; ?>" class="gallery-img">

            <div class="gallery-body">
                <div class="gallery-title">
                    <?= $row['judul']; ?>
                </div>

                <a href="hapus_galeri.php?id=<?= $row['id_galeri']; ?>"
                   class="btn btn-delete"
                   onclick="return confirm('Yakin ingin menghapus foto ini?')">
                    <i class="bi bi-trash-fill"></i> Hapus
                </a>
            </div>

        </div>
    </div>
<?php } ?>

</div>

</body>
</html>