<?php

include "connexion.php";



$n = json_decode($_POST['n']);



$requ = "INSERT INTO messagerie (id_user1,id_user2,msg) 
        VALUES ('$n[2]','$n[1]','$n[0]')";
         
 if(!mysqli_query($con, $requ)){
     echo "
     <script>   alert('error');</script>";
 }



?>
