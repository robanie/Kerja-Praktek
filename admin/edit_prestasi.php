<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM prestasi WHERE id_prestasi='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Prestasi</title>
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
            max-width: 850px;
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

        .preview-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 18px;
            margin-bottom: 25px;
        }

        .preview-img {
            width: 100%;
            max-width: 220px;
            height: 150px;
            object-fit: cover;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 14px;
            border: 1px solid #dbe2ea;
            padding: 14px 16px;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.12);
        }

        textarea.form-control {
            min-height: 140px;
            resize: none;
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            background: #f8fafc;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .upload-icon {
            width: 75px;
            height: 75px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 15px;
            box-shadow: 0 10px 20px rgba(37,99,235,0.2);
        }

        .btn-update {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 14px 24px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-update:hover {
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

            .preview-img {
                max-width: 100%;
                height: 180px;
            }
        }
    </style>
</head>

<body>

<a href="prestasi.php" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Kelola Prestasi
</a>

<div class="form-card">

    <div class="form-header">
        <h2>Edit Prestasi</h2>
        <p>Perbarui data prestasi sekolah dengan tampilan yang lebih lengkap dan rapi.</p>
    </div>

    <div class="preview-card text-center">
        <img src="../assets/img/<?= $row['gambar']; ?>" class="preview-img mb-3">
        <div>
            <h5 class="mb-1"><?= $row['nama_prestasi']; ?></h5>
            <span class="badge bg-primary"><?= $row['tingkat']; ?></span>
            <span class="badge bg-secondary"><?= $row['tahun']; ?></span>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Nama Prestasi</label>
            <input type="text" name="nama" class="form-control" value="<?= $row['nama_prestasi']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Prestasi</label>
            <textarea name="deskripsi" class="form-control"><?= $row['deskripsi']; ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tahun</label>
                <input type="text" name="tahun" class="form-control" value="<?= $row['tahun']; ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="Sekolah" <?= $row['tingkat'] == 'Sekolah' ? 'selected' : ''; ?>>Sekolah</option>
                    <option value="Kecamatan" <?= $row['tingkat'] == 'Kecamatan' ? 'selected' : ''; ?>>Kecamatan</option>
                    <option value="Kabupaten" <?= $row['tingkat'] == 'Kabupaten' ? 'selected' : ''; ?>>Kabupaten</option>
                    <option value="Provinsi" <?= $row['tingkat'] == 'Provinsi' ? 'selected' : ''; ?>>Provinsi</option>
                    <option value="Nasional" <?= $row['tingkat'] == 'Nasional' ? 'selected' : ''; ?>>Nasional</option>
                    <option value="Internasional" <?= $row['tingkat'] == 'Internasional' ? 'selected' : ''; ?>>Internasional</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Ganti Gambar (Opsional)</label>

            <div class="upload-box">
                <div class="upload-icon">
                    <i class="bi bi-image-fill"></i>
                </div>

                <p class="fw-semibold mb-1">Upload Gambar Baru</p>
                <p class="text-muted small mb-3">Kosongkan jika tidak ingin mengganti gambar lama</p>

                <input type="file" name="gambar" class="form-control">
            </div>
        </div>

        <button name="update" class="btn btn-update w-100">
            <i class="bi bi-save-fill"></i> Update Prestasi
        </button>

    </form>

    <?php
    if(isset($_POST['update'])){

        $file = $_FILES['gambar']['name'];

        if($file != ""){
            move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/img/".$file);
            $gambar = $file;
        } else {
            $gambar = $row['gambar'];
        }

        mysqli_query($koneksi,"UPDATE prestasi SET 
            nama_prestasi='$_POST[nama]',
            deskripsi='$_POST[deskripsi]',
            tahun='$_POST[tahun]',
            tingkat='$_POST[tingkat]',
            gambar='$gambar'
            WHERE id_prestasi='$id'
        ");

        echo "<script>alert('Prestasi berhasil diupdate');location='prestasi.php';</script>";
    }
    ?>

</div>

</body>
</html>