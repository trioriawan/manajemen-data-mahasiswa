<?php
include 'koneksi.php';

// Pastikan parameter ID ada di URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query Hapus Data berdasarkan ID
    $query = "DELETE FROM tbl_mahasiswa WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit();
}
?>