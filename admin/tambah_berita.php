<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita</title>
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

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .form-card {
            max-width: 750px;
            margin: auto;
            background: white;
            border-radius: 28px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #64748b;
            margin: 0;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            padding: 14px 16px;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.12);
        }

        textarea.form-control {
            min-height: 180px;
            resize: none;
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            background: #f8fafc;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .upload-box i {
            font-size: 40px;
            color: #3b82f6;
            margin-bottom: 10px;
        }

        .btn-save {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 24px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 10px 20px rgba(37,99,235,0.2);
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 15px;
            }

            .form-card {
                padding: 25px 20px;
                border-radius: 22px;
            }
        }
    </style>
</head>

<body>

<a href="berita.php" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Kelola Berita
</a>

<div class="form-card">

    <div class="form-header">
        <h2>Tambah Berita</h2>
        <p>Tambahkan berita terbaru untuk ditampilkan di website sekolah.</p>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Berita</label>
            <textarea name="isi" class="form-control" placeholder="Tulis isi berita di sini..." required></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Upload Gambar</label>

            <div class="upload-box">
                <i class="bi bi-cloud-arrow-up-fill"></i>
                <p class="mb-2 text-muted">Pilih gambar untuk berita</p>
                <input type="file" name="gambar" class="form-control" required>
            </div>
        </div>

        <button name="simpan" class="btn btn-save w-100">
            <i class="bi bi-save-fill"></i> Simpan Berita
        </button>

    </form>

    <?php
    if (isset($_POST['simpan'])) {

        $judul = $_POST['judul'];
        $isi   = $_POST['isi'];
        $tgl   = date('Y-m-d');

        $nama_file = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../assets/img/".$nama_file);

        mysqli_query($koneksi, "INSERT INTO berita VALUES (
            '',
            '$judul',
            '$isi',
            '$nama_file',
            '$tgl'
        )");

        echo "<script>alert('Berita berhasil ditambahkan'); location='berita.php';</script>";
    }
    ?>

</div>

</body>
</html>