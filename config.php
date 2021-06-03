<?php 
$server = "localhost";
$user = "root";
$pass = "";
$dbase = "esemka-his";

$koneksi = mysqli_connect($server, $user, $pass, $dbase);

if (mysqli_connect_error()) {
   echo("Koneksi Gagal : ".mysqli_connect_error());
}
?>
