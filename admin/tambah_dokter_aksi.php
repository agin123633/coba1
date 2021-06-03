<?php 
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$nama_dokter = $_POST['nama_dokter'];
$nama_poli = $_POST['nama_poli'];
// menginput data ke database
mysqli_query($koneksi,"insert into dokter values('','$nama_dokter','$nama_poli')");

// mengalihkan halaman kembali ke index.php
header("location:dokter.php");

?>