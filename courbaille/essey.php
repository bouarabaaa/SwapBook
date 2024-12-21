
<?php

$host = 'localhost';
$dbname = 'pfe';
$username = 'root';
$password = '';

$con = mysqli_connect('localhost','root','','pfe') or die(mysqli_error());



    
    
        $req = "INSERT INTO user (nom,prenom,username,pass,ville,typee) VALUES ('f','f','f','f','f','admin')";
    
       if(mysqli_query($con, $req)){
        echo "jfoifhdofhkkkkkkkkkkkkkkkkkkkkkkkkkkk";
       }
       else{
           echo "error";
       }
       
   





?>


