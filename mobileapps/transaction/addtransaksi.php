<?php 
if (!empty($_POST['id_user'])){
   //memanggil koneksi database
   $result = array();
   $u_id = $_POST['id_user'];
   
  
include ("../koneksi.php");
   //mengecek koneksi
  if ($con) {
    $sql = "SELECT `u_id`, `title_product`, `quantity`, `price` FROM cart WHERE `u_id`=".$u_id.";";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) != 0) {
        while ($row = mysqli_fetch_assoc($res)){
        
            
            //sql query untuk mengirim data ke tabel B
       		$sql_insert = "INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `remark`, `date`) VALUES (NULL, '". $row["u_id"]."', '".$row["title_product"]."', '".$row["quantity"]."', '".$row["price"]."', '', NULL, current_timestamp());";
       		
       		if ($con->query($sql_insert)){
   		    	$sqlll= "DELETE FROM `cart` WHERE `u_id`=".$u_id."";
   		    	if($con->query($sqlll)){
   		    	    
   		    	    $result = array("status" => "success", "message" => "berhasil");
   		    	    
   		    	}else $result = array("status" => "failed", "message" => "failed while inserting");
   		    } else{
   		        $result = array("status" => "failed", "message" => "failed while inserting");
   		    } 
        }
    }
    
}else $result = array("status" => "failed", "message" => "Unauthorised access");
} else $result = array("status" => "failed", "message" => "id_user kosong");
echo json_encode($result, JSON_PRETTY_PRINT);
?>