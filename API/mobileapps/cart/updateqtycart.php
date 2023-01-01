<?php
if(!empty($_POST['id_cart'])){
        if (!empty($_POST['quantity']) && !empty($_POST['description']) && !empty($_POST['price'])) {
            
            
include ("../koneksi.php");
            
            $id_cart = $_POST['id_cart'];
            $description = $_POST['description'];
            $note = $_POST['note'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            
            if($con){
                $sql = "UPDATE `cart` SET `description`='".$description."',`note`='".$note."',`price`='".$price."',`quantity`='".$quantity."' WHERE `id_cart`='".$id_cart."'";
                if (mysqli_query($con, $sql)) {
                    $result = array("status" => "success", "message" => "berhasil");
                }else $result = array("status" => "failed", "message" => "gagal update");
            }else $result = array("status" => "failed", "message" => "Database Connection failed");
        }else $result = array("status" => "failed", "message" => "Pilih Produk terlebih dahulu");
}else $result = array("status" => "failed", "message" => "Pilih Produk terlebih dahulu"); 
echo json_encode($result, JSON_PRETTY_PRINT);
?>