<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4" style="background:#f1f5f9;">

<div class="container">
    <div class="card p-4 shadow rounded-4">
        <h3>Tambah Materi</h3>
        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Upload File Materi</label>
                <input type="file" name="file_materi" class="form-control" required>
            </div>

            <button name="simpan" class="btn btn-primary">Simpan Materi</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['simpan'])){

    $judul = $_POST['judul_materi'];
    $deskripsi = $_POST['deskripsi'];
    $tgl = date('Y-m-d');

    $nama_file = $_FILES['file_materi']['name'];
    $tmp = $_FILES['file_materi']['tmp_name'];

    move_uploaded_file($tmp, "../assets/materi/".$nama_file);

    mysqli_query($koneksi, "INSERT INTO materi VALUES(
        '',
        '$judul',
        '$deskripsi',
        '$nama_file',
        '$tgl'
    )");

    echo "<script>alert('Materi berhasil ditambahkan');location='materi.php';</script>";
}
?>

</body>
</html>