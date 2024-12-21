<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire de connexion </title>
  <link rel="stylesheet" href="stylec.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
  <form method="POST">
     
    <h1>Se connecter</h1>
    <div class="social-media">
      <p><a href="https://microclub.net/" target="_blank"><i class="fab fa-google"></i></a></p>
      <p><a href="https://www.youtube.com/channel/UCoC4e-jxPVtk1S2vtByFXWg" target="_blank"><i class="fab fa-youtube"></i></a></p>
      <p><a href="https://www.facebook.com/Micro.Club.USTHB/" target="_blank"><i class="fab fa-facebook-f"></i></a></p>
      <p><a href="https://twitter.com/MicroClub2015" target="_blank"><i class="fab fa-twitter"></i></a></p>
    </div>
<br> <br> <br>
    
    <div class="inputs">
      <input type="text" name="login" placeholder="Nom d'utilisateur" />
      <input type="password" name="password" placeholder="Mot de passe">
    </div>
 
                    
    <p class="inscription"><a href="inscription.php" >créer un compte</a> </p>
    <div align="center">
    <input type="submit" value="Se connecter" name="ok">
    
    </div>
    <p id="error">Nom d'utilisateur ou mot de passe Incorrect!!</p> 
  </form>


 
<?php 
include "connexion.php";

session_start();

if(isset($_POST['ok'])){
    
    $username=$_POST["login"];
    $password=$_POST["password"];
   
    $r="SELECT * FROM user WHERE username='$username' AND pass='$password' ";
    $reponse= $con->query($r);
    $iduser = $reponse->fetch_array(MYSQLI_NUM);
   


    if($reponse->num_rows>0){
      if($iduser[6]=='lecteur'){
        $_SESSION['user'] = $iduser;
        header('location:acces.php');

      }
      elseif($iduser[6]=='admin'){
        $_SESSION['admin'] = $iduser;
        header('location:admin.php');

      }

      elseif($iduser[6]=='bibliotheque'){
        $_SESSION['bibliotheque'] = $iduser;
        header('location:bibliotheque.php');

      }
      elseif($iduser[6]=='quizy'){
        $_SESSION['quizy'] = $iduser;
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