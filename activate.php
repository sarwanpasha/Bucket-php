<?php
include 'global.php';
$code= $_GET['code'];

if(!$code){
    echo 'No code Supplied';
}
 else {
     $code=  mysql_query("SELECT * FROM phplogin WHERE code='$code' AND active='1'" );
     if(mysql_num_rows($check==1)){
         echo 'You have already activated your account';
         
     }
     else{
         $activate=  mysql_query("UPDATE phplogin SET active='1' WHERE code='$code'");
         echo 'Your acount has been acivated';
     }
}



?>