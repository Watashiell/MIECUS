<?php
if (!empty($_POST['username']) && 
    !empty($_POST['firstname']) &&
    !empty($_POST['lastname']) && 
    !empty($_POST['email']) && 
    !empty($_POST['phone_number']) && 
    !empty($_POST['password']) && 
    !empty($_POST['address'])) {
    
   
include ("../koneksi.php");
    
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $address = $_POST['address'];
if ($con) {
    
    $check_username = mysqli_query($con, "SELECT username FROM users where username = '" . $_POST['username'] . "' ");
        $check_email = mysqli_query($con, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");
        
    if (strlen($_POST['password']) < 6) {
            echo "Password minilmanl 6 karakter";
        } elseif (strlen($_POST['phone_number']) < 10) {
            echo "Invalid phone number!";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address !";
        } elseif (mysqli_num_rows($check_username) > 0) {
            echo "Username Tersedia";
        } elseif (mysqli_num_rows($check_email) > 0) {
            echo "Email Tersedia";
        } else {
    $sql = "INSERT INTO `users`(`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `apiKey`) VALUES (null,'".$username."','".$firstname."','".$lastname."','".$email."','".$phonenumber."','".md5($_POST['password'])."','".$address."','');";
    
    if (mysqli_query($con, $sql)) {
        echo "success";
    } else echo "Registration failed";
        }
    
} else echo "Database connection failed";
} else echo "All fields are required";
?>