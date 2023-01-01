<?php
if (!empty($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $resultt = array();

    // Koneksi ke database

    
include ("../koneksi.php");

    // Query untuk mengambil data dari tabel A
    $query = "SELECT price, quantity FROM cart WHERE `u_id` = '".$id_user."'";
    $sql2 = "SELECT`address` FROM `users` WHERE `u_id`='".$id_user."'";
    $result = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $sql2);

    // Inisialisasi total
    $total = 0;

    // Perulangan untuk mengambil data
    while($row = mysqli_fetch_array($result)) {
        // Melakukan perkalian antara kolom A dan B
        $kali = $row['price'] * $row['quantity'];
        // Menjumlahkan total
        $total += $kali;
        $resultt = array("status" => "success", "message" => "berhasil", "total" => $total);
    }

}else $result = array("status" => "failed", "message" => "Pilih terlebih dahulu");
echo json_encode($resultt, JSON_PRETTY_PRINT);
?>