
<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["user"][0];

?>


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






    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="#">Anis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivre.php">ajouter livre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Css</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">JavaScript</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                tracks
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">php</a>
                <a class="dropdown-item" href="#">nodjc</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">laravel</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


<div class="container">

<div class="text-center m-5">
        <h1>ajouter</h1>
        <p>ajouter livre</p>
    </div>

      <form method="POST">
      <div class="form-group">
    <label for="exampleInputEmail1">referance</label>
    <input type="number" name="rf" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">le referance de livre</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">titre</label>
    <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">le titre de livre</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">date</label>
    <input type="text" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">la date d'edition</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">categorie</label>
    <input type="text" name="categorie" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">le type de livre</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">nombre d'exemplaire</label>
    <input type="number" name="nbrexp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">le nombre d'exemplaire de ce livre</small>
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="ok">Submit</button>
</form>

</div>





<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>


<script src="js/tr.js"></script>
<script src="js/tr2.js"></script>



<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>



   <?php


if(isset($_POST['ok'])){
  $rf =$_POST["rf"];
  $titre =$_POST["titre"];
  $date =$_POST["date"];
  $categorie =$_POST["categorie"];
  $nbrexp =$_POST["nbrexp"];
    
        $req = "INSERT INTO livre (idlivre,titre,datedition,categorie) VALUES ('$rf','$titre','$date','$categorie')";
    
       if(mysqli_query($con, $req)){

        $req2 = "INSERT INTO avoire (id,idlivre,nbrexemplaire) VALUES ('$iduser','$rf','$nbrexp')";

        if(mysqli_query($con, $req2)){        echo "
            <script>   alert('votre livre est bien enregistreeeeeeeee');</script>";
    
    
           }
           else{
            echo "
            <script>   alert('error');</script>";
           }

        echo "
        <script>   alert('votre livre est bien enregistre');</script>";


       }
       else{
        echo "
        <script>   alert('error');</script>";
       }
       
   


      }

?>




</body>
</html>

