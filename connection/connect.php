<?php

//main connection file for both admin & front end
$servername = "localhost"; //server
$username = "id20050233_root"; //username
$password = "Andrafengxui69."; //password
$dbname = "id20050233_miesuh"; //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) { //checking connection to DB	
    die("Koneksi Gagal: " . mysqli_connect_error());
}

?>
