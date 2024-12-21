<!DOCTYPE html>
<html>
<head>
  <title>project java script</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>



<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["user"][0];

if(!empty($_GET["idu"] && $_GET["idadmin"])){

  $idadmin = $_GET["idadmin"];
  $idu = $_GET["idu"];
  $user = "admin";

  $req = "select username from user where id='$idu'";
  $reqq = mysqli_query($con, $req);
  $usernamme = mysqli_fetch_array($reqq);
  if(!mysqli_query($con, $req)){
     echo "
     <script>   alert('error');</script>";
}

}


?>


<!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="#">Anis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="stat.php">statistique <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                profil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">consulter</a>
                <a class="dropdown-item" href="modifierprofil.php">modifier</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


      <div class="text-center m-5">
        <h1>Messagerie</h1>
        
    </div>

      <form method="POST">
      <div class="form-group">
      <h5 style="background-color:blue;
    color:white">Messages</h5>

    <?php

$rec = "select * from messagerie where ( id_user='$idu'  and
 usernamme='admin' ) or ( id_user=0 and usernamme='$usernamme[0]' )
   order by id asc";


$recupmessage = mysqli_query($con,$rec);
if(!$recupmessage){
  echo"error";
 }else{
    while($messagee=mysqli_fetch_array($recupmessage)){     
    ?>
    <div>
        <h4><?= $messagee[2]; ?></h4> 
        <p><?= $messagee[3]; ?></p> 
    </div>
   <?php 
    }  
    }
    ?>
     
    <input type="text" name="message" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Aa">
    <small id="emailHelp" class="form-text text-muted">Ecrivez votre message </small>
  </div>
  <button type="submit" class="btn btn-primary" name="ok">envoyer</button>
  
<?php


if(isset($_POST['ok'])){
    
  $message =$_POST["message"];
        
  $requ = "INSERT INTO messagerie (id_user,usernamme,msg) 
  VALUES ('0','$username[0]','$message')";

  if(mysqli_query($con, $requ)){

  

   echo "
   <script>   window.location.href='messagerieL.php'; </script>";
  }
   else{
    echo "
    <script>   alert('error');</script>";
  

}
}
    if(isset($_POST['ok'])){
        
            $message =$_POST["message"];
                  
            $rec = "INSERT INTO messagerie (id_user,usernamme,msg) 
            VALUES ('$idu','$user','$message')";

            if(mysqli_query($con, $rec)){

              echo "
              <script>   window.location.href='messagerieL.php'; </script>";
             }
              else{
               echo "
               <script>   alert('error');</script>";
             
           
           }
    }

?>

  </body>
</html>
