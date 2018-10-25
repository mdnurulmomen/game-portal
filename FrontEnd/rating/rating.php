<?php


$ipaddress = md5($_SERVER['REMOTE_ADDR']); 
if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $conn = helper_login("robi");  
         $select_outid="SELECT USER_ID FROM tbl_rating` WHERE USER_ID=$ipaddress";
         $res = helper_select_query($conn, $select_outid);
		 if(!$res){
		             $query ="INSERT INTO tbl_rating (RATE,USER_ID)VALUES('$rate', '$ipaddress');";
					  helper_insert_query($conn, $query); 
					  echo "0";
                  }else{
				  
				     echo 2;
				  }
			  helper_logout($conn); 	
		}
      
?>