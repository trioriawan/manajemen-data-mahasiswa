<?php
require_once('koneksi.php');

// Disesuaikan dengan kolom database Anda: nim, nama_lengkap
$sql = "SELECT id, nim, nama_lengkap FROM tbl_mahasiswa";
$r = mysqli_query($con,$sql);
$result = array();

while($row = mysqli_fetch_array($r)){
    array_push($result,array(
        "id"=>$row['id'],
        "nim"=>$row['nim'],
        "nama"=>$row['nama_lengkap'] // disesuaikan dari nama_lengkap
    ));
}

echo json_encode(array('result'=>$result));
mysqli_close($con);
?>