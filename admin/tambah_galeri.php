<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
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
            max-width: 700px;
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

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            background: #f8fafc;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin: 0 auto 18px;
            box-shadow: 0 10px 20px rgba(37,99,235,0.2);
        }

        .upload-title {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .upload-subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .btn-upload {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 24px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-upload:hover {
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

            .upload-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<a href="galeri.php" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Kelola Galeri
</a>

<div class="form-card">

    <div class="form-header">
        <h2>Upload Foto Galeri</h2>
        <p>Tambahkan foto baru untuk dokumentasi kegiatan sekolah.</p>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-4">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul foto">
        </div>

        <div class="mb-4">
            <label class="form-label">Upload Gambar</label>

            <div class="upload-box">
                <div class="upload-icon">
                    <i class="bi bi-image-fill"></i>
                </div>

                <div class="upload-title">Pilih Foto Terbaik</div>
                <div class="upload-subtitle">Format JPG, PNG, atau WEBP</div>

                <input type="file" name="gambar" class="form-control" required>
            </div>
        </div>

        <button name="upload" class="btn btn-upload w-100">
            <i class="bi bi-cloud-arrow-up-fill"></i> Upload Foto
        </button>

    </form>

    <?php
    if (isset($_POST['upload'])) {

        $judul = $_POST['judul'];

        $nama_file = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../assets/img/".$nama_file);

        mysqli_query($koneksi, "INSERT INTO galeri VALUES ('','$judul','$nama_file')");

        echo "<script>alert('Foto berhasil diupload'); location='galeri.php';</script>";
    }
    ?>

</div>

</body>
</html>