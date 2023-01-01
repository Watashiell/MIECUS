<?php
$result = array();
include ("../koneksi.php");
if ($con) {
    $sql = "SELECT * FROM `dishes` WHERE `rs_id` NOT LIKE '%6%' ORDER BY `dishes`.`rs_id` ASC";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
    while ($row = mysqli_fetch_assoc($res)){
        $data[] = [
            "id_product" => $row["d_id"],
            "title" => $row["title"],
            "price" => $row["price"],
            "description" => $row["slogan"],
            "image" => $row['img']
        ];
    }
    				
echo json_encode($data);
                   
        }else $result = array("status" => "failed", "message" => "Unauthorised access");
    }else $result = array("status" => "failed", "message" => "Database connection failed");

?>