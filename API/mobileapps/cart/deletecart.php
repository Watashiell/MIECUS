<?php
if (!empty($_POST['id_cart'])) {
    
 
include ("../koneksi.php");
    
    $id_cart = $_POST['id_cart'];
if ($con) {
        $sql = "DELETE FROM `cart` WHERE `id_cart`='" . $id_cart . "'";
    if (mysqli_query($con, $sql)) {
        $result = array("status" => "success", "message" => "deleted");
    } else $result = array("status" => "failed", "message" => "Failed delete cart");;
    
} else $result = array("status" => "failed", "message" => "database connection failed");
}else $result = array("status" => "failed", "message" => "id_cart not found");
echo json_encode($result, JSON_PRETTY_PRINT);
?>