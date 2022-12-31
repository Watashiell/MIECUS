<?php
include("../connection/connect.php");
$title = $_POST['title'];
$slogan = $_POST['slogan'];
$price = $_POST['price'];

$query = "INSERT INTO dishes SET title='$title', slogan='$slogan', price='$price'";
mysqli_query($db, $dbname) or die('tidak bisa:' . mysqli_error($db));

header("location: all_menu.php")
    ?>