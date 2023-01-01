<?php
$hostmysql = "localhost";
$username = "id20061294_root";
$password = "Umkm_andramie1";
$database = "id20061294_db_miesuh";

$con = mysqli_connect($hostmysql, $username, $password, $database);

if (!$con) die ("Koneksi gagal");
mysqli_select_db($con, $database) or die ("Database tidak ditemukan"); 
?>
