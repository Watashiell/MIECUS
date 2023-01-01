<?php
if (!empty($_POST['id_user']) &&
    !empty($_POST['username']) && 
    !empty($_POST['firstname']) &&
    !empty($_POST['lastname']) && 
    !empty($_POST['email']) && 
    !empty($_POST['phonenumber']) && 
    !empty($_POST['address'])) {
    
include ("../koneksi.php");
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
if ($con) {
    $sql = "UPDATE `users` SET 
    `username`='".$username."',
    `f_name`='".$firstname."',
    `l_name`='".$lastname."',
    `email`='".$email."',
    `phone`='".$phonenumber."',
    `address`='".$address."'
    WHERE 
    `u_id`='".$id_user."';
    ";
    if (mysqli_query($con, $sql)) {
        echo "success";
    } else echo "Registration failed";
    
    
} else echo "Database connection failed";
} else echo "All fields are required";
?>