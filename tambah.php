<?php
include 'koneksi.php'; // Menggunakan include sesuai file tugas Anda

if($_SERVER['REQUEST_METHOD']=='POST'){
    // Menyesuaikan kiriman key dari Android dan variabel database Anda
    $nim          = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat       = mysqli_real_escape_string($koneksi, $_POST['email']); // Ditampung dari input alamat Android
    $jurusan      = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    
    // Menyesuaikan nama kolom tabel asli Anda: Alamat dan Jurusan (Kapital)
    $query = "INSERT INTO tbl_mahasiswa (nim, nama_lengkap, Alamat, Jurusan) 
              VALUES ('$nim', '$nama_lengkap', '$alamat', '$jurusan')";
    
    if(mysqli_query($koneksi, $query)){
        echo 'Berhasil Menambahkan Mahasiswa';
    } else {
        echo 'Gagal Menambahkan Mahasiswa: ' . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>