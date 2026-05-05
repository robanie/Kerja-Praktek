<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Berita</title>
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
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
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

        .table-card {
            background: white;
            border-radius: 24px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead {
            background: #f8fafc;
        }

        .table thead th {
            border: none;
            padding: 18px 15px;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .table tbody td {
            padding: 18px 15px;
            border-color: #eef2f7;
            color: #334155;
        }

        .img-thumb {
            width: 90px;
            height: 60px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .btn-action {
            border: none;
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-edit {
            background: #facc15;
            color: #1e293b;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .btn-action:hover {
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

            .table-responsive {
                overflow-x: auto;
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
        <h2>Kelola Berita</h2>
        <p>Kelola seluruh berita dan informasi terbaru sekolah.</p>
    </div>

    <a href="tambah_berita.php" class="btn btn-add">
        <i class="bi bi-plus-circle-fill"></i> Tambah Berita
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <strong><?= $row['judul']; ?></strong>
                    </td>
                    <td>
                        <img src="../assets/img/<?= $row['gambar']; ?>" class="img-thumb">
                    </td>
                    <td><?= $row['tanggal']; ?></td>
                    <td class="text-center">
                        <a href="edit_berita.php?id=<?= $row['id_berita']; ?>" class="btn btn-action btn-edit me-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <a href="hapus_berita.php?id=<?= $row['id_berita']; ?>" 
                           class="btn btn-action btn-delete"
                           onclick="return confirm('Yakin ingin menghapus berita ini?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>