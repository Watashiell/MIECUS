<?php
if (!empty($_POST['email']) && !empty($_POST['password'])) {
$email = $_POST['email'];
$password = $_POST['password'];
$result = array();
include ("../koneksi.php");
if ($con) {
    $loginquery = "SELECT * FROM users WHERE email='$email' && password='" . md5($password) . "'";
    $result = mysqli_query($con, $loginquery);
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
    try {
        $apiKey = bin2hex(random_bytes(23));
    } catch (Exception $e) {
        $apiKey = bin2hex(uniqid($email, true));
    }
    $sqlUpdate = "update users set apiKey = '".$apiKey. "' where email = '" . $email . "'";
    if (mysqli_query($con, $sqlUpdate)) {
        $result = array("status" => "success", "message" => "Login successful","username" => $row['username'], "email" => $row['email'], "address" => $row['address'], "id_user" => $row['u_id'], "apiKey" => $apiKey);
            
            }else $result = array("status" => "failed", "message" => "Login failed try again");
    }else $result = array("status" => "failed", "message" => "Email atau password salah");
}else $result = array("status" => "failed", "message" => "Database connection failed");
}else $result = array("status" => "failed", "message" => "All fields are required");
echo json_encode($result, JSON_PRETTY_PRINT);
?>