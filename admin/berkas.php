<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM berkas ORDER BY id_berkas DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Berkas</title>
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

        .berkas-card {
            background: white;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.3s;
            height: 100%;
        }

        .berkas-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .berkas-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .berkas-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }

        .badge-kategori {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
        }

        .berkas-desc {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
            min-height: 60px;
        }

        .file-box {
            background: #f8fafc;
            border-radius: 14px;
            padding: 12px 14px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #334155;
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
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
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
        <h2>Kelola Berkas</h2>
        <p>Kelola seluruh dokumen dan berkas sekolah.</p>
    </div>

    <a href="tambah_berkas.php" class="btn btn-add">
        <i class="bi bi-plus-circle-fill"></i> Tambah Berkas
    </a>
</div>

<div class="row g-4">

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<div class="col-lg-4 col-md-6">
    <div class="berkas-card">

        <div class="berkas-icon">
            <i class="bi bi-file-earmark-richtext-fill"></i>
        </div>

        <h5 class="berkas-title"><?= $row['judul']; ?></h5>

        <span class="badge-kategori">
            <i class="bi bi-folder-fill"></i> <?= $row['kategori']; ?>
        </span>

        <div class="berkas-desc">
            <?= substr($row['deskripsi'],0,90); ?>...
        </div>

        <div class="file-box">
            <i class="bi bi-file-earmark-arrow-down-fill text-danger"></i>
            <?= $row['file_berkas']; ?>
        </div>

        <div class="action-buttons">
            <a href="edit_berkas.php?id=<?= $row['id_berkas']; ?>" class="btn btn-edit w-100">
                <i class="bi bi-pencil-square"></i> Edit
            </a>

            <a href="hapus_berkas.php?id=<?= $row['id_berkas']; ?>" 
               class="btn btn-delete w-100"
               onclick="return confirm('Yakin ingin menghapus berkas ini?')">
                <i class="bi bi-trash-fill"></i> Hapus
            </a>
        </div>

    </div>
</div>
<?php } ?>

</div>

</body>
</html>