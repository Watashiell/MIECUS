<?php
if (!empty($_POST['u_id'])) {
   if (!empty($_POST['d_id'])) {
        if (!empty($_POST['title_product'])) {
            if (!empty($_POST['image'])) {
                if (!empty($_POST['description'])) {
                    if (!empty($_POST['price'])) {
                        if (!empty($_POST['quantity'])) {
         
include ("../koneksi.php");
         
    
                            $id_user = $_POST['u_id'];
                            $id_product = $_POST['d_id'];
                            $title_product = $_POST['title_product'];
                            $image = $_POST['image'];
                            $description = $_POST['description'];
                            $note = $_POST['note'];
                            $price = $_POST['price'];
                            $quantity = $_POST['quantity'];
                            
    if ($con) {
    $sql = "SELECT * FROM `cart` WHERE `u_id` = '".$id_user."' AND `d_id`='".$id_product."' AND `note`='".$note."';";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        if ($row = mysqli_fetch_assoc($res)) {
            $id_cart = $row['id_cart'];
            $qtylama = $row['quantity'];
            $qtybaru = $quantity + $row['quantity'];
            $sqll = "UPDATE `cart` SET `quantity`='" .$qtybaru. "' WHERE `id_cart`='" . $id_cart . "'";
            if (mysqli_query($con, $sqll)) {
                $result = array("status" => "success", "message" => "Success to add to cart 2");
            }else $result = array("status" => "failed", "message" => "failed 2");
        }else $result = array("status" => "failed", "message" => "failed 3");
    }else{
        $sqle = "
INSERT INTO `cart` (`id_cart`, `u_id`, `d_id`, `title_product`, `image`, `description`, `note`, `price`, `quantity`) VALUES (null,'".$id_user."','".$id_product."','".$title_product."','".$image."','".$description."','".$note."','".$price."','".$quantity."');";
       
            if (mysqli_query($con, $sqle)) {
                    $result = array("status" => "success", "message" => "berhasil");  
                
            }else $result = array("status" => "failed", "message" => "failed4");
    }
}else $result = array("status" => "failed", "message" => "Database connection failed");

                        } else $result = array("status" => "failed", "message" => "quantity kosong");

                  } else $result = array("status" => "failed", "message" => "price kosong");

                } else $result = array("status" => "failed", "message" => "description kosong");

            } else $result = array("status" => "failed", "message" => "image kosong");
        } else $result = array("status" => "failed", "message" => "title_product kosong");

    } else $result = array("status" => "failed", "message" => "id_product produk kosong");
} else $result = array("status" => "failed", "message" => "id_user kosong");

echo json_encode($result, JSON_PRETTY_PRINT);

?>