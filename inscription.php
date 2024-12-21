<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire d'inscription </title>
  <link rel="stylesheet" href="stylec.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>


  <form method="POST" enctype="multipart/form-data">
     
    <h1>créer un compte</h1>

    <label> photo de profile : </label> <br/>
      <input type="file" name="avatar" /> <br/><br/>

    <div class="inputs">
        <input class="inp" type="text" placeholder="nom" name="nom" required>
        
        <input class="inp" type="text" placeholder="prénom" name="prenom" required>
        
        <input type="text" placeholder="ville" name="ville" class="inp" required>
       
    <input type="text"  name="datens" class="form-control" id="exampleInputEmail1" placeholder="date de naiissance (yyyy-mm-dd)" required>
    
    <input type="text" id="geolocalisation" placeholder="lien de localisation ( colle le depuis google maps )" name="geolocalisation" required>


      <div>

        <input class="inp" type="text" placeholder="username" name="username" required>
        <input class="inp" type="password" placeholder="Password" name="Password" required>
      </div>
   
<div>
      <div class="select" >
      
        <select name="sexe" id="format">
          <option selected disabled> sexe </option>
          <option value="Male" name="sexe">Male</option>
          <option value="Female" name="sexe">Femelle</option>
          
        </select>
        
</div>

<div class="select" >
        <select name="specialite" id="format" >
          <option selected disabled> specialite </option>
          <option value="medcine" name="specialite">medcine</option>
          <option value="autre" name="specialite">autre</option>
          
        </select>
       
    </div>
    
</div>
    </div>
                    
   
    <div align="center">
    <input type="submit" value="enregistrer" name="ok">
    
    </div>
    
    <p class="inscription"><a href="connexionuser.php" >connexion</a> </p>
    <p id="error">Nom d'utilisateur existe deja!</p> 
  </form>


 
  <?php

include "connexion.php";
$chemin = 0;

if(isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])){

  $aa = "select max(id) from user";
  $bb = mysqli_query($con,$aa);
  if(!$bb){
   echo"rak tkhelet";
  }else{
    $id = mysqli_fetch_array($bb);
  }
  $p = 1;
  $cid = $id[0] + $p;
       $taillemax = 2097152;
       $extensionsvalides = array('jpg', 'jpeg', 'gif', 'png');
       if($_FILES['avatar']['size'] <= $taillemax){
         $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsvalides)){
           $chemin = "images/".$cid.".".$extensionUpload;
           $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
           
           if($resultat){
  
          }else{ 
             $msg = "erreur durant l'importation de votre photo de profile";
             ?>
             <script> alert('erreur durant importation de votre photo de profile'); </script>;
             <?php
           }
  
         }else{
           $msg = "votre photo de profile doit etre de format jpg jpeg gif ou pnj";
           ?>
           <script> alert('votre photo de profile doit etre de format jpg jpeg gif ou pnj'); </script>;
           <?php
         }
  
       }else{
         $msg = "votre photo de profile ne doit pas depassée 2mo";
         ?>
         <script> alert('votre photo de profile ne doit pas depassée 2mo'); </script>;
         <?php
       }
  
     }



if(isset($_POST['ok'])){
  $nom =$_POST["nom"];
  $prenom =$_POST["prenom"];
  $username =$_POST["username"];
  $Password =$_POST["Password"];
  $ville =$_POST["ville"];
  $datens=$_POST["datens"];
  $localisation=$_POST["geolocalisation"];
  $sexe =$_POST["sexe"];
  $specialite =$_POST["specialite"];
   


    if ($chemin == 0){
      $req = "INSERT INTO user (nom,prenom,username,pass,ville,datenaissance,localisation,sexe,specialite) VALUES ('$nom','$prenom','$username','$Password','$ville','$datens','$localisation','$sexe','$specialite')";
    }else{
        $req = "INSERT INTO user (nom,prenom,username,pass,ville,datenaissance,srcimage,localisation,sexe,specialite) VALUES ('$nom','$prenom','$username','$Password','$ville','$datens','$chemin','$localisation','$sexe','$specialite')";
    }
       if(mysqli_query($con, $req)){

        echo "
        <script>   alert('inscription validee, qliquez sur connexion pour vous connecter');</script>";


       }
       else{
           echo "<script>
           document.getElementById('error').style.display='block';
           </script>";
       }
       
   


      }


?>

</body>
</html>