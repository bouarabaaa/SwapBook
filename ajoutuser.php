



<!DOCTYPE html>
<html>
<head>
  <title>Ajout user</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">

    <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
    <link rel="stylesheet" href="admin.css?v=<?php echo time();?>">
    
</head>

<body>


<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["admin"][0];

    $reqt33 = "select * from signale";




    
    $res33 = mysqli_query($con,$reqt33);
    if(!$res33){
      echo"error";
     }
   
   
   
     $reqtttt3 = "select * from signale where lu='0'";
   
   
   
   
       
     $ressssss3 = mysqli_query($con,$reqtttt3);
     if(!$ressssss3){
       echo"error";
      }
   
      if( $ressssss3->num_rows==0){
       $not="";
      }else{
       $not=$ressssss3->num_rows;
      }
   


?>


<?php
/**********************************commentaire ************************ */
function encrypt($data, $key) {
  $iv = '1234567812345678';
  $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}


$key = "MaCleDeCryptage";

/**********************************commentaire ************************ */
?>



    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="#">SwapBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutuser.php">ajouter admin <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stat.php">statistique <span class="sr-only"></span></a>
            </li>










            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 <i class="fa fa-bell" aria-hidden="true" ><span class="text-danger" onclick="updatesig()"><?php echo $not;?></span> </i>

              </a>
              <div class="dropdown-menu p-2 notify" aria-labelledby="navbarDropdown">





              

              <?php 

                              if($res33->num_rows>0){


                                while($ligne33=mysqli_fetch_array($res33)){


                                     $reqt22 = "select * from user  where id = '$ligne33[0]'";
                                     $reqt44 = "select * from user  where id = '$ligne33[1]'";

                                     $res22 = mysqli_query($con,$reqt22);
                                     $res44 = mysqli_query($con,$reqt44);
                                     if(!$res22 || !$res44){
                                       echo"error";
                                      }else{
                                         $ligne22=mysqli_fetch_array($res22);
                                         $ligne44=mysqli_fetch_array($res44);



      
                                          $b ='<a href="#" class="btn btn-primary mb-0">contact</a>';
                                          
 

                                         echo ' 




                                                     <div class="notifi-item ">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[3].'</h4>

                                                       <div class="row d-flex flex-row">
                                                       
                                                       <div class=col-10 justify-content-start">
                                                        <h4>a signale '.$ligne44[3].' pour le motif :</h4>
                                                        <p>'.$ligne33[2].'</p>
                                                       </div>
                                                       <div class="col-1 justify-content-start">
                                                       <i class="fa fa-window-close fa-2x text-danger" aria-hidden="true"></i>
                                                       </div>
                                                       </div>
                                                      
                                                      
                                                      
                                                       
                                                     </div> 
                                                   </div>
                                                  
                                         ';

                                      }

                                 }

                              }



      

                        ?>





              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 <i class="fa fa-comments" aria-hidden="true"><span class="text-danger"><?php echo $not;?></span> </i>
                 

              </a>
              <div class="dropdown-menu p-2 notify" aria-labelledby="navbarDropdown">





              

              <?php 

                             
$c = "delete from msgntf  ";
$d = mysqli_query($con, $c);
if(!mysqli_query($con, $c)){
  echo "
  <script>   alert('error');</script>";
}
       $a = "insert into msgntf select * from messagerie";
       $b = mysqli_query($con, $a);
       if(!mysqli_query($con, $a)){
        echo "
        <script>   alert('error 1');</script>";
       }else{
        
        $re = "select * from msgntf where id_user1='$iduser' or id_user2='$iduser' order by id asc";
  $r = mysqli_query($con, $re);
  if(!mysqli_query($con, $re)){
     echo "
     <script>   alert('error 2');</script>";
}else{
  $i=0;
  $z=0;
  while($m=mysqli_fetch_array($r)){
    $z=$m[0];
    }
$n=0;
  while($z<>$n){
    
$n=$z;
$r = mysqli_query($con, $re);
  while($messagee=mysqli_fetch_array($r)){
    
$id = $messagee[1];
$msg = $messagee[3];
$idd = $messagee[2];
$date = $messagee[4];
}

if($id == $iduser){
  $req = "select * from user where id = '$idd'";
  $eq = mysqli_query($con, $req);
  $user = mysqli_fetch_array($eq);
  $username = $user[3];
  $img = $user[9];
  $type = $user[6];
  if(!mysqli_query($con, $req)){
     echo "
     <script>   alert('error');</script>";
}

$dateObj = new DateTime($date);

$dateFormattee = $dateObj->format('d/m H:i'); 


/*********************************commentaire                    ************************** */

$idlm=encrypt($idd, $key);
$idum=encrypt($iduser, $key);
$b ='<a href="messagerieA.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


/*********************************commentaire                    ************************** */ 
                                          
echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
           <h3>'.$username.'-'.$type.'</h4>

           <div class="row w-100">
           
           <div class="col-9 justify-content-start">
           <h4>vous : '.$msg.'</h4>
           <p>'.$dateFormattee.'</p>
           </div>
           <div class="col-2 justify-content-start">
           '.$b.'
           </div>
           </div>
                                                      
                                                      
        </div> 
       </div>
                                         ';

$ree = "delete from msgntf where ((id_user1='$iduser' and id_user2='$idd') or
 (id_user2='$iduser' and id_user1='$idd')) ";
$ri = mysqli_query($con, $ree);
if(!mysqli_query($con, $ree)){
   echo "
   <script>   alert('error 4');</script>";
}
}else{
  $req = "select * from user where id = '$id'";
  $eq = mysqli_query($con, $req);
  $user = mysqli_fetch_array($eq);
  $username = $user[3];
  $img = $user[9];
  $type = $user[6];
  if(!mysqli_query($con, $req)){
     echo "
     <script>   alert('error');</script>";
}

$dateObj = new DateTime($date);

$dateFormattee = $dateObj->format('d/m H:i'); 
/*********************************commentaire                    ************************** */

$idlm=encrypt($id, $key);
$idum=encrypt($iduser, $key);
$b ='<a href="messagerieA.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


/*********************************commentaire                    ************************** */ 
                                          
echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
         <h3>'.$username.'-'.$type.'</h4>

           <div class="row w-100">
           
           <div class="col-9 justify-content-start">
           <h4>'.$username.' : '.$msg.'</h4>
           <p>'.$dateFormattee.'</p>
           </div>
           <div class="col-2 justify-content-start">
           '.$b.'
           </div>
           </div>
                                                      
                                                      
        </div> 
       </div>
                                         ';

$ree = "delete from msgntf where ((id_user1='$iduser' and id_user2='$id') or
 (id_user2='$iduser' and id_user1='$id')) ";
$ri = mysqli_query($con, $ree);
if(!mysqli_query($con, $ree)){
   echo "
   <script>   alert('error 4');</script>";
}
}

  $re = "select * from msgntf where id_user1='$iduser' or id_user2='$iduser' order by id asc";
  $r = mysqli_query($con, $re);
  if(!mysqli_query($con, $re)){
     echo "
     <script>   alert('error');</script>";
}
while($m=mysqli_fetch_array($r)){
  $z=$m[0];
}
  
  


  }
}
       }
?>





              </div>
            </li>

          </ul>
        </div>
      </nav>










      <div class="container">

<div class="text-center m-5">
<h1><span class="grtitre2"><span class="cl">A</span>jou<span class="cl">t</span>er<span class="cl"> us</span>er</span></h1>
        <p>ajouter un admin,quizy,bibliotheque</p>
    </div>

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
      <label> image : </label> <br/>
      <input type="file" name="avatar" /> <br/><br/>
    <label for="exampleInputEmail1">nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1"  placeholder="entrer le nom">
    <small id="emailHelp" class="form-text text-muted">le nom de l'admine</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">prenom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1"  placeholder="entrer le prenom">
    <small id="emailHelp" class="form-text text-muted"> prenom de l'admine</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1"  placeholder="entrer le username">
    <small id="emailHelp" class="form-text text-muted">username de l'admine</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputEmail1" placeholder="entrer le password">
    <small id="emailHelp" class="form-text text-muted"> password de l'admine</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">ville</label>
    <input type="text" name="ville" class="form-control" id="exampleInputEmail1"  placeholder="entrer la ville">
    <small id="emailHelp" class="form-text text-muted">ville de l'admine</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">localisation</label>
    <input type="text" name="localisation" class="form-control" id="exampleInputEmail1"  placeholder="entrer la localisation">
    <small id="emailHelp" class="form-text text-muted">localisation de l'admine</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">date naissance</label>
    <input type="text" name="datens" class="form-control" id="exampleInputEmail1"   placeholder="yyyy-mm-dd">
    <small id="emailHelp" class="form-text text-muted"> date naissance de l'admine</small>
  </div>


  <div class="form-group" required>
  <label for="exampleInputEmail1">type</label>
      
  <select name="typee" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
        <option value="admin" name="typee">admin</option>
        <option value="quizy" name="typee">quizy</option>
        <option value="bibliotheque" name="typee">bibliotheque</option>
 
    </select>
     <small id="emailHelp" class="form-text text-muted">type de user</small>

</div>


<div class="form-group" required>
  <label for="exampleInputEmail1">sexe</label>
      
  <select name="sexe" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
        <option value="male" name="typee">male</option>
        <option value="femelle" name="typee">femelle</option>

 
    </select>
     <small id="emailHelp" class="form-text text-muted">le sexe de user</small>

</div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="ok">Submit</button>
</form>

</div>

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
  $password =$_POST["pass"];
  $ville =$_POST["ville"];
  $datens =$_POST["datens"];
  $localisation =$_POST["localisation"];
  $sexe =$_POST["sexe"];
  $typee =$_POST["typee"];

  if ($chemin == 0){
    $req2 = "INSERT INTO user (nom,prenom,username,pass,ville,typee,datenaissance,localisation,sexe) VALUES ('$nom','$prenom','$username','$Password','$ville','$typee','$datens','$localisation','$sexe')";
       
  }else{
     $req2 = "INSERT INTO user (nom,prenom,username,pass,ville,typee,datenaissance,srcimage,localisation,sexe) VALUES ('$nom','$prenom','$username','$Password','$ville','$typee','$datens','$chemin','$localisation','$sexe')";
  }
       if(mysqli_query($con, $req2)){


         header('location:admin.php');
         echo "
         <script>   alert('user est bien enregestre');</script>";


       }
       else{
        echo "
        <script>   alert('username existe deja vous devez le changer');</script>";
       }
       
   


      }

?>






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


</body>
</html>

