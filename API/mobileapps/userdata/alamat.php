<?php
if (!empty($_POST['id_user'])) {
$id_user = $_POST['id_user'];
$result = array();
include ("../koneksi.php");
if ($con) {
    $sql = "SELECT `address` FROM `users` WHERE `u_id` = '".$id_user."'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        if ($row = mysqli_fetch_assoc($res)) {
            $result = array( 
                "status" => "success", 
                "message" => "get address successful",
                "address" => $row["address"]
            );
           }
        }else $result = array("status" => "failed", "message" => "Unauthorised access");
    }else $result = array("status" => "failed", "message" => "Database connection failed");
    
}else $result = array("status" => "failed", "message" => "All fields are required");
echo json_encode($result, JSON_PRETTY_PRINT);
?>