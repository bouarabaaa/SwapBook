
<!DOCTYPE html> 
<html lang="en"> 
<head>
      <meta charset="UTF-8"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta name="viewport" contents="width=device-width, initial-scale=1.0"> 
      <link rel="stylesheet" href="bootstrap.min.css">
      <title>Document</title>
</head> 
<body> 
<div class="login">
    <form method="POST" class="elevated rounded mt-5">
             <h1>Connexion</h1>
            <label>Nom d'utilisateur</label><br>
            <input type="text" name="login" class="form-control py-3" placeholder="Entrer le email "><br>
            <label>Mot de passe</label><br>
            <input type="password" name="password" class="form-control py-3" placeholder="Entrer le mot de passe "><br>
             <p style="display:none" id="error">
             Nom d'utilisateur ou mot de passe Incorrect!!</p>
             <button class="btn col-12 mt-3 py-2" name="ok">LOGIN</button>
    </form>
</div> 
<?php 
include "connexion.php";

session_start();

if(isset($_POST['ok'])){
    $username=$_POST["login"];
    $password=$_POST["password"];
    
    $r="SELECT * FROM user WHERE user_name='$username' AND pass='$password' ";
    $reponse= $con->query($r);
    $iduser = $reponse->fetch_array(MYSQLI_NUM);
    $_SESSION['user'] = $iduser;
    if($reponse->num_rows>0){
   
    header('location:acces.php');
    
    }
    
    else{
     
    echo "
    <script>
    document.getElementById('error').style.display='block';
    document.getElementById('error').style.color='red';
    </script>
    ";
    }
    $reponse->free_result();}
    ?> 
    <style>
        body{
                background-color:green;
            }
        .login{
             width: 450px;
             height: 220px;
             background-color:white;
             padding: 20px;
             border-radius: 10px;
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%);
               }
        .login h1{
             text-align: center;
                }
        .btn{
             background-color: green;
             color: white;
            }
</style>
</body> 
</html>