<?php
if (!empty($_POST['id_user'])) {
    $id_user =$_POST['id_user'];
    $result = array();
    
   
include ("../koneksi.php");
    if ($con) {
        $sql = "SELECT * FROM `users_orders` WHERE `u_id` = '".$id_user."'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
              while ($row = mysqli_fetch_assoc($res)){
            $data[] = [ 
            "id_order" => $row["o_id"],
            "id_user" => $row["u_id"],
            "title" => $row["title"],
            "quantity" => $row["quantity"],
            "price" => $row["price"],
            "status" => $row["status"],
            "remark" => $row['remark'],
            "date" => $row['date']
            ];
            }
            $result =array("status" => "succes", "message" => " berhasil", "data" =>$data);
            
        } else
            $result = array("status" => "failed", "message" => "Failed get data from cart");
    } else
        $result = array("status" => "failed", "message" => "Database connection failed");
}else $result = array("status" => "failed", "message" => "Login before buy");
echo json_encode($data, JSON_PRETTY_PRINT);
?>