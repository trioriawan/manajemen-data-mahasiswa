<?php
include 'koneksi.php';

// Proses mengambil data dari tabel mahasiswa
$query = "SELECT * FROM tbl_mahasiswa ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; color: white; }
        .btn-tambah { background-color: #28a745; }
        .btn-hapus { background-color: #dc3545; font-size: 13px; }
    </style>
</head>
<body>

    <h2>Daftar Data Mahasiswa</h2>
    
    <a href="tambah.php" class="btn btn-tambah">+ Tambah Mahasiswa</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Alamat']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Jurusan']) . "</td>";
                    echo "<td><a href='hapus.php?id=" . $row['id'] . "' class='btn btn-hapus' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data mahasiswa.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>