<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM berkas WHERE id_berkas='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Berkas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f1f5f9;
            padding:30px;
        }

        .back-btn{
            display:inline-flex;
            align-items:center;
            gap:8px;
            color:#2563eb;
            text-decoration:none;
            font-weight:500;
            margin-bottom:20px;
        }

        .form-card{
            max-width:900px;
            margin:auto;
            background:white;
            border-radius:28px;
            padding:35px;
            box-shadow:0 15px 40px rgba(0,0,0,0.06);
        }

        .form-header{
            margin-bottom:30px;
        }

        .form-header h2{
            font-weight:700;
            color:#1e293b;
            margin-bottom:8px;
        }

        .form-header p{
            color:#64748b;
            margin:0;
        }

        .preview-card{
            background:#f8fafc;
            border:1px solid #e2e8f0;
            border-radius:18px;
            padding:20px;
            margin-bottom:30px;
        }

        .file-icon{
            width:100px;
            height:100px;
            border-radius:24px;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:42px;
            margin:auto;
            box-shadow:0 10px 20px rgba(37,99,235,0.2);
        }

        .preview-date{
            display:inline-flex;
            align-items:center;
            gap:6px;
            background:#dbeafe;
            color:#2563eb;
            padding:8px 14px;
            border-radius:30px;
            font-size:14px;
            font-weight:500;
        }

        .form-label{
            font-weight:600;
            color:#334155;
            margin-bottom:8px;
        }

        .form-control{
            border-radius:14px;
            border:1px solid #dbe2ea;
            padding:14px 16px;
            font-size:15px;
            transition:0.3s;
            box-shadow:none;
        }

        .form-control:focus{
            border-color:#3b82f6;
            box-shadow:0 0 0 4px rgba(59,130,246,0.12);
        }

        textarea.form-control{
            min-height:180px;
            resize:vertical;
        }

        .upload-box{
            border:2px dashed #cbd5e1;
            border-radius:18px;
            padding:25px;
            text-align:center;
            background:#f8fafc;
            transition:0.3s;
        }

        .upload-box:hover{
            border-color:#3b82f6;
            background:#eff6ff;
        }

        .upload-icon{
            width:75px;
            height:75px;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            margin:0 auto 15px;
        }

        .btn-update{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            border:none;
            border-radius:14px;
            padding:14px 24px;
            font-weight:600;
            transition:0.3s;
        }

        .btn-update:hover{
            transform:translateY(-2px);
            color:white;
            box-shadow:0 10px 20px rgba(37,99,235,0.2);
        }

        @media(max-width:768px){
            body{
                padding:20px 15px;
            }

            .form-card{
                padding:25px 20px;
                border-radius:22px;
            }
        }
    </style>
</head>
<body>

<a href="berkas.php" class="back-btn">
    <i class="bi bi-arrow-left"></i> Kembali ke Kelola Berkas
</a>

<div class="form-card">

    <div class="form-header">
        <h2>Edit Berkas</h2>
        <p>Perbarui data berkas yang tersedia untuk siswa / pengunjung website.</p>
    </div>

    <div class="preview-card">
        <div class="row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <div class="file-icon">
                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                </div>
            </div>

            <div class="col-md-9">
                <h4 class="fw-bold mb-3"><?= $row['judul_berkas']; ?></h4>

                <div class="preview-date mb-3">
                    <i class="bi bi-calendar-event"></i>
                    <?= $row['tanggal_upload']; ?>
                </div>

                <p class="text-muted mb-0">
                    <?= substr(strip_tags($row['deskripsi']),0,140); ?>...
                </p>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Judul Berkas</label>
            <input type="text" name="judul_berkas" class="form-control"
                   value="<?= $row['judul_berkas']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?= $row['deskripsi']; ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Ganti File Berkas (Opsional)</label>

            <div class="upload-box">
                <div class="upload-icon">
                    <i class="bi bi-cloud-upload-fill"></i>
                </div>

                <p class="fw-semibold mb-1">Upload File Baru</p>
                <p class="text-muted small mb-3">Kosongkan jika tidak ingin mengganti file lama</p>

                <input type="file" name="file_berkas" class="form-control">
            </div>
        </div>

        <button name="update" class="btn btn-update w-100">
            <i class="bi bi-save-fill"></i> Update Berkas
        </button>

    </form>

    <?php
    if(isset($_POST['update'])){

        $judul = $_POST['judul_berkas'];
        $deskripsi = $_POST['deskripsi'];

        if($_FILES['file_berkas']['name'] != ""){

            $nama_file = $_FILES['file_berkas']['name'];
            $tmp = $_FILES['file_berkas']['tmp_name'];

            move_uploaded_file($tmp, "../assets/berkas/".$nama_file);

            mysqli_query($koneksi, "UPDATE berkas SET
                judul_berkas='$judul',
                deskripsi='$deskripsi',
                file_berkas='$nama_file'
                WHERE id_berkas='$id'
            ");

        } else {

            mysqli_query($koneksi, "UPDATE berkas SET
                judul_berkas='$judul',
                deskripsi='$deskripsi'
                WHERE id_berkas='$id'
            ");
        }

        echo "<script>
                alert('Berkas berhasil diupdate');
                location='berkas.php';
              </script>";
    }
    ?>

</div>

</body>
</html>