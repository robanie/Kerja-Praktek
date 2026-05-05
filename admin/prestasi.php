<?php
session_start();
include '../config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM prestasi ORDER BY id_prestasi DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Prestasi</title>
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

        .btn-add {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 10px 20px rgba(37,99,235,0.2);
        }

        .prestasi-card {
            background: white;
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.3s;
            height: 100%;
        }

        .prestasi-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .prestasi-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .prestasi-body {
            padding: 20px;
        }

        .prestasi-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .prestasi-meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .badge-tahun,
        .badge-tingkat {
            padding: 8px 12px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 500;
        }

        .badge-tahun {
            background: #e0f2fe;
            color: #0284c7;
        }

        .badge-tingkat {
            background: #dcfce7;
            color: #15803d;
        }

        .prestasi-desc {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
            min-height: 45px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background: #facc15;
            color: #1e293b;
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
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

        .btn-edit:hover,
        .btn-delete:hover {
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons {
                flex-direction: column;
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
        <h2>Kelola Prestasi</h2>
        <p>Kelola seluruh prestasi dan pencapaian sekolah.</p>
    </div>

    <a href="tambah_prestasi.php" class="btn btn-add">
        <i class="bi bi-plus-circle-fill"></i> Tambah Prestasi
    </a>
</div>

<div class="row g-4">
<?php while($row = mysqli_fetch_assoc($data)) { ?>
<div class="col-lg-4 col-md-6">
    <div class="prestasi-card">

        <img src="../assets/img/<?= $row['gambar']; ?>" class="prestasi-img">

        <div class="prestasi-body">
            <h5 class="prestasi-title"><?= $row['nama_prestasi']; ?></h5>

            <div class="prestasi-meta">
                <span class="badge-tahun">
                    <i class="bi bi-calendar-event"></i> <?= $row['tahun']; ?>
                </span>

                <span class="badge-tingkat">
                    <i class="bi bi-award-fill"></i> <?= $row['tingkat']; ?>
                </span>
            </div>

            <div class="prestasi-desc">
                <?= substr($row['deskripsi'],0,80); ?>...
            </div>

            <div class="action-buttons">
                <a href="edit_prestasi.php?id=<?= $row['id_prestasi']; ?>" class="btn btn-edit w-100">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>

                <a href="hapus_prestasi.php?id=<?= $row['id_prestasi']; ?>" 
                   class="btn btn-delete w-100"
                   onclick="return confirm('Yakin ingin menghapus prestasi ini?')">
                    <i class="bi bi-trash-fill"></i> Hapus
                </a>
            </div>
        </div>

    </div>
</div>
<?php } ?>
</div>

</body>
</html>