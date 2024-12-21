



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

    $reqt = "select * from demlivre where idlctlivre = '$iduser'";




/*$reqt = "select max(id) from projet";*/
$res = mysqli_query($con,$reqt);
if(!$res){
  echo"error";
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
              <a class="nav-link" href="acc.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivre2.php">ajouter livre</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="offreqz.php">quizy</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="livrebibliotheque.php">bibliotheque</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="notification.php">notification</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                profil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="acces.php">consulter</a>
                <a class="dropdown-item" href="mdprfll.php">modifier</a>
              </div>
            </li>
          </ul>

        </div>
      </nav>



      



      <div class="container">

      <div class="row">

      <?php 

if($res->num_rows>0){


  while($ligne=mysqli_fetch_array($res)){

        $reqt2 = "select username from user  where id = '$ligne[0]'";
    $reqt3 = "select titre from livre2  where iduser = '$iduser' and idlivree='$ligne[1]'";

    $res2 = mysqli_query($con,$reqt2);
    $res3 = mysqli_query($con,$reqt3);
    if(!$res2 || !$res2){
      echo"error";
     }else{
        $ligne2=mysqli_fetch_array($res2);
        $ligne3=mysqli_fetch_array($res3);
        echo '
              <div class="col-12  mb-4 mt-4">-le livre '.$ligne3[0].' referance '.$ligne[1].' est demande par le lecteur '.$ligne2[0].' le '.$ligne[2].'</div>
        ';

     }

  }

    }



      

      ?>

     
      </div>
      </div>



      
<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
 



</body>
</html>
