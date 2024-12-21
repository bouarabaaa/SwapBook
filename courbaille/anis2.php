<!DOCTYPE html>
<html>
<head>
  <title>project java script</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->

<link rel="stylesheet" href="anis3.css">
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

<div class="forms">

  <div class="anis">
    <form method="POST">
      <h1>sing in </h1>
      <div class="inph">
        <input class="inp" type="text" placeholder="nom" name="nom" required>
        <input class="inp" type="text" placeholder="prenom" name="prenom" required>
      </div>

      <div class="inph">

        <input class="inp" type="text" placeholder="username" name="username" required>
        <input class="inp" type="password" placeholder="Password" name="Password" required>
      </div>


      <div class="inph" required>
      
        <select name="typee" id="typeuser" class="inp" >
          <option value="admin" name="typee">admin</option>
          <option value="quizy" name="typee">quizy</option>
          <option value="bibliotheque" name="typee">bibliotheque</option>
          <option value="lecterur" name="typee">lecterur</option>
   
       </select>
       <input type="text" placeholder="ville" name="ville" class="inp" required>

    </div>



      <div class="btn">
        <input class="inp" type="submit" value="signe in" name="ok">
        
      </div>
      <p id="error">Nom d'utilisateur existe deja!!</p>

    </form>
  
  </div>
  
  
  <div class="links">
    <a id="par4" href="https://microclub.net/" target="_blank"><i class="fa fa-google-plus"></i>microclub.net</a> 
       <a id="par1" href="https://twitter.com/MicroClub2015" target="_blank"><i class="fa fa-twitter"></i>twitter.com/untitled-tld</a> 
       <a id="par3" href="https://www.instagram.com/microclub_usthb/" target="_blank"><i class="fa fa-instagram"></i>instagram.com/untitled-tld</a>
       <a id="par2" href="https://www.facebook.com/Micro.Club.USTHB/" target="_blank"><i class="fa fa-facebook"></i>facebook.com/untitled-tld</a> 
       <a id="par5" href="https://vymaps.com/DZ/Micro-Club-Usthb-1031725513516853/" target="_blank"><i class="fa fa-home"></i>32 El Alia 16111 Bab Ezzouar, Alger.</a> 
  
  </div>
    <div class="claire"></div>

</div>





</div>


<script src="anis.js"></script>

<?php

include "connexion.php";


if(isset($_POST['ok'])){
  $nom =$_POST["nom"];
  $prenom =$_POST["prenom"];
  $username =$_POST["username"];
  $Password =$_POST["Password"];
  $ville =$_POST["ville"];
  $typee =$_POST["typee"];
    
        $req = "INSERT INTO user (nom,prenom,username,pass,ville,typee) VALUES ('$nom','$prenom','$username','$Password','$ville','$typee')";
    
       if(mysqli_query($con, $req)){

        echo "
        <script>   alert('votre inscription est bien enregistre');</script>";


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