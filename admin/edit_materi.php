<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_materi='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4" style="background:#f1f5f9;">

<div class="container">
    <div class="card p-4 shadow rounded-4">
        <h3>Edit Materi</h3>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control"
                       value="<?= $row['judul_materi']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= $row['deskripsi']; ?></textarea>
            </div>

            <div class="mb-3">
                <label>Ganti File (Opsional)</label>
                <input type="file" name="file_materi" class="form-control">
            </div>

            <button name="update" class="btn btn-primary">Update Materi</button>

        </form>
    </div>
</div>

<?php
if(isset($_POST['update'])){

    $judul = $_POST['judul_materi'];
    $deskripsi = $_POST['deskripsi'];

    if($_FILES['file_materi']['name'] != ""){

        $nama_file = $_FILES['file_materi']['name'];
        $tmp = $_FILES['file_materi']['tmp_name'];

        move_uploaded_file($tmp, "../assets/materi/".$nama_file);

        mysqli_query($koneksi, "UPDATE materi SET
            judul_materi='$judul',
            deskripsi='$deskripsi',
            file_materi='$nama_file'
            WHERE id_materi='$id'
        ");

    } else {

        mysqli_query($koneksi, "UPDATE materi SET
            judul_materi='$judul',
            deskripsi='$deskripsi'
            WHERE id_materi='$id'
        ");
    }

    echo "<script>alert('Materi berhasil diupdate');location='materi.php';</script>";
}
?>

</body>
</html>