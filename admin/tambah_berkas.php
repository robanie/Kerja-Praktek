<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $judul       = $_POST['judul'];
    $deskripsi   = $_POST['deskripsi'];
    $kategori    = $_POST['kategori'];
    $tanggal     = date('Y-m-d');

    $nama_file   = $_FILES['file_berkas']['name'];
    $tmp         = $_FILES['file_berkas']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/berkas/".$nama_file);

    $query = mysqli_query($koneksi, "INSERT INTO berkas VALUES (
        '',
        '$judul',
        '$deskripsi',
        '$nama_file',
        '$tanggal',
        '$kategori'
    )");

    if($query){
        echo "<script>alert('Berkas berhasil ditambahkan');location='berkas.php';</script>";
    }else{
        echo "<script>alert('Gagal menyimpan data');</script>";
        echo mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berkas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    <div class="card p-4 shadow rounded-4">
        <h3 class="mb-4">Tambah Berkas</h3>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Judul Berkas</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Upload File</label>
                <input type="file" name="file_berkas" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">
                Simpan Berkas
            </button>

        </form>
    </div>
</div>

</body>
</html>