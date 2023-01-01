<?php
if (!empty($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $result = array();
    
include ("../koneksi.php");
    if ($con) {
        $sql = "SELECT * FROM `cart` WHERE `title_product` NOT IN ('Custom Mie') AND `u_id` = '".$id_user."'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
             while ($row = mysqli_fetch_assoc($res)){
            $data[] = [ 
                "id_cart" => $row["id_cart"],
                    "id_user" => $row["u_id"],
                    "id_product" => $row["id_product"],
                    "title_product" => $row["title_product"],
                    "image" => $row['image'],
                    "description" => $row['description'],
                    "note" => $row["note"],
                    "price" => $row["price"],
                    "quantity" => $row["quantity"]
            ];
            }
            $result =array("status" => "succes", "message" => " berhasil", "data" =>$data);
        } else
            $result = array("status" => "failed", "message" => " Failed get data cart");
    } else
        $result = array("status" => "failed", "message" => "Database connection failed");
}else $result = array("status" => "failed", "message" => "Login before buy");
echo json_encode($data, JSON_PRETTY_PRINT);
?>