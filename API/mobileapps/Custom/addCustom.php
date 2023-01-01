<?php
if (!empty($_POST['id_user']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['quantity'])) {
    
   
include ("../koneksi.php");
   $result = array();
    $title = "Custom Mie";
    $id_user = $_POST['id_user'];
    $description = $_POST['description'];
    $note = $_POST['note'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
if ($con) {
    $sql = "INSERT INTO `products` (`id_product`, `title`, `rs_id`, `price`, `description`, `image`) VALUES (NULL, 'Custom Mie', '6', '".$price."', '".$description."', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png');";
    
    if (mysqli_query($con, $sql)) {
        $sqll = "SELECT * FROM `products` WHERE `rs_id`=6";
        $res = mysqli_query($con, $sqll);
        if (mysqli_num_rows($res) != 0) {
        while ($row = mysqli_fetch_assoc($res)){
            $id_product = $row["id_product"];
            $title = $row["title"];
            $price = $row["price"];
            $description = $row["description"];
            $image = $row["image"];
        }
        $sqlll = "INSERT INTO `cart` (`id_cart`, `u_id`, `id_product`, `title_product`, `image`, `description`, `note`, `price`, `quantity`)
        VALUES (NULL, '".$id_user."', '".$id_product."', '".$title."', '".$image."', '".$description."', '".$note."', '".$price."','".$quantity."')";
            if (mysqli_query($con, $sqlll)) {
                $sql2 = "DELETE FROM `products` WHERE `id_product`='".$id_product."'";
                if (mysqli_query($con, $sql2)) {
                    $result = array("status" => "success", "message" => "Success to add to cart");  
                }
            }else $result = array("status" => "failed", "message" => "Failed to add to cart");
        }else $result = array("status" => "failed", "message" => "Failed to get product");
    } else $result = array("status" => "failed", "message" => "Failed to add to product");


    } else $result = array("status" => "failed", "message" => "Database connection failed");
} else $result = array("status" => "failed", "message" => "All fields are required");
echo json_encode($result, JSON_PRETTY_PRINT);
?>