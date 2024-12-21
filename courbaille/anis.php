<!DOCTYPE html>
<html>
<head>
  <title>project java script</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">

<link rel="stylesheet" href="anis.css">
</head>

<body>
<div class="overly">
  <nav class="navbar">
    <img class="logo" src="logo.png">
    <ul>
      <li><a class="active" href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Feedback</a></li>
    </ul>
  </nav>
    <div class="anis">
<form method="POST">
    <h1>connexion </h1>
    <input class="inp" type="text" name="login" placeholder="username">
    <input class="inp" type="password" name="password" placeholder="Password">
    <input class="inp" type="submit" value="signe in" name="ok">
</form>
<p id="error">Nom d'utilisateur ou mot de passe Incorrect!!</p>
</div>

</div>

<script src="anis.js"></script>
<?php 
include "connexion.php";

session_start();

if(isset($_POST['ok'])){
    $username=$_POST["login"];
    $password=$_POST["password"];
    
    $r="SELECT * FROM user WHERE username='$username' AND pass='$password' ";
    $reponse= $con->query($r);
    $iduser = $reponse->fetch_array(MYSQLI_NUM);

    if($iduser[6]=='lecteur'){
      $_SESSION['user'] = $iduser;
    }elseif($iduser[6]=='admin'){
      $_SESSION['admin'] = $iduser;
    }elseif($iduser[6]=='bibliotheque'){
      $_SESSION['bibliotheque'] = $iduser;
    }
    elseif($iduser[6]=='quizy'){
      $_SESSION['quizy'] = $iduser;
    }



    if($reponse->num_rows>0){
      if($iduser[6]=='lecteur'){
        header('location:acces.php');

      }
      elseif($iduser[6]=='admin'){
        header('location:admin.php');

      }

      elseif($iduser[6]=='bibliotheque'){
        header('location:bibliotheque.php');

      }
      elseif($iduser[6]=='quizy'){
        header('location:quizy.php');

      }
   
    
    
    }
    
    else{
     
    echo "
    <script>
    document.getElementById('error').style.display='block';
    </script>
    ";
    }
    $reponse->free_result();}
    ?> 



</body>
</html>