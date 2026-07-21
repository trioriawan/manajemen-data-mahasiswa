<?php
$id = $_GET['id'];
require_once('koneksi.php');

$sql = "SELECT * FROM tbl_mahasiswa WHERE id=$id";
$r = mysqli_query($con,$sql);
$result = array();
$row = mysqli_fetch_array($r);

array_push($result,array(
    "id"=>$row['id'],
    "nim"=>$row['nim'],
    "nama"=>$row['nama_lengkap'], // disesuaikan
    "jurusan"=>$row['jurusan'],
    "alamat"=>$row['alamat'] // email diganti menjadi alamat sesuai gambar
));

echo json_encode(array('result'=>$result));
mysqli_close($con);
?>