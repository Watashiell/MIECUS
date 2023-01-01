<?php
if (!empty($_POST['username']) && !empty($_POST['apiKey'])) {
$username = $_POST['username'];
$apiKey = $_POST['apiKey'];
$result = array();
include ("../koneksi.php");
if ($con) {
    $sql = "select * from users where username = '".$username."' or apiKey = '".$apiKey."'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        if ($row = mysqli_fetch_assoc($res)) {
            $result = array( 
                "status" => "success", 
                "message" => "Login successful",
                "id_user" => $row["u_id"],
                "username" => $row["username"],
                "firstname" => $row["f_name"],
                "lastname" => $row["l_name"],
                "email" => $row['email'],
                "phone_number" => $row["phone"],
                "password" => $row["password"],
                "address" => $row["address"]
            );
           }
        }else $result = array("status" => "failed", "message" => "Unauthorised access");
    }else $result = array("status" => "failed", "message" => "Database connection failed");
    
}else $result = array("status" => "failed", "message" => "All fields are required");
echo json_encode($result, JSON_PRETTY_PRINT);
?>