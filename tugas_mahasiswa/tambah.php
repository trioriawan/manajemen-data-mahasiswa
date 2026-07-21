<?php
include 'koneksi.php';

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {
    $nim          = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $alamat       = mysqli_real_escape_string($koneksi, $_POST['Alamat']);
    $jurusan      = mysqli_real_escape_string($koneksi, $_POST['Jurusan']);

    // Query Insert Data
    $query = "INSERT INTO tbl_mahasiswa (nim, nama_lengkap, Alamat, Jurusan) 
              VALUES ('$nim', '$nama_lengkap', '$alamat', '$jurusan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 15px; width: 300px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn-simpan { background-color: #007bff; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 4px; }
        .btn-kembali { background-color: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-left: 10px; }
    </style>
</head>
<body>

    <h2>Tambah Mahasiswa Baru</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" maxlength="12" required placeholder="Contoh: 2401010782">
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" maxlength="50" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="Alamat" maxlength="50" required>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="Jurusan" maxlength="15" required placeholder="Contoh: TI / SI / SK">
        </div>
        
        <button type="submit" name="submit" class="btn-simpan">Simpan Data</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>

</body>
</html>