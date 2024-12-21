
<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["bibliotheque"][0];

function encrypt($data, $key) {
  $iv = '1234567812345678';
  $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}

// Fonction de décryptage
function decrypt($data, $key) {
  list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
  return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}
$key = "MaCleDeCryptage";


if(!empty($_GET["idl"] && $_GET["idu"])){

  $idl = decrypt($_GET["idl"],$key);
  $idu = decrypt($_GET["idu"],$key);
    $reqt = "select * from livre2 where idlivree ='$idl' and iduser ='$idu'";
    


    $res = mysqli_query($con,$reqt);
    if(!$res){
        echo"error";
     }
    else{

        $ligne=mysqli_fetch_array($res);

    }



}
$reqt33 = "select * from demlivre where idlctlivre = '$iduser' and affiche='0' order by valide";



$res33 = mysqli_query($con,$reqt33);
if(!$res33){
  echo"error";
 }



 $reqtttt3 = "select * from demlivre where idlctlivre = '$iduser' and valide='0'";




    
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



<!DOCTYPE html>
<html>
<head>
  <title>modification d'un livre</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
</head>

<body>







    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-primary" href="#">SwapBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="bibliotheque.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivrebib.php">ajouter livre</a>
            </li>



            

            <li class="nav-item">
              <a class="nav-link" href="statbib.php">Statistique<span class="sr-only"></span></a>
            </li>


            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 <i class="fa fa-bell" aria-hidden="true"><span class="text-danger"><?php echo $not;?></span></i>

              </a>
              <div class="dropdown-menu p-2 notify" aria-labelledby="navbarDropdown">





              

              

              <?php 

                              if($res33->num_rows>0){


                                while($ligne33=mysqli_fetch_array($res33)){


                                     $reqt22 = "select * from user  where id = '$ligne33[0]'";
                                     $reqt44 = "select * from livre2  where iduser = '$iduser' and idlivree='$ligne33[1]'";

                                     $res22 = mysqli_query($con,$reqt22);
                                     $res44 = mysqli_query($con,$reqt44);
                                     if(!$res22 || !$res44){
                                       echo"error";
                                      }else{
                                         $ligne22=mysqli_fetch_array($res22);
                                         $ligne44=mysqli_fetch_array($res44);
                                         if($ligne33[4]==0){

                                          $idlanb=encrypt($ligne33[1], $key);
                                          $iduanb=encrypt($ligne33[3], $key);
                                          $dateanb=encrypt($ligne33[2], $key);
                                          $idlctanb=encrypt($ligne22[0], $key);
                                          $nbexanb=encrypt($ligne44[5], $key);
      
                                          $b ='<a href="annulerdembib.php?idl='.$idlanb.'&idu='.$iduanb.'&date='.$dateanb.'&idlct='.$idlctanb.'&nbex='.$nbexanb.'" class="btn btn-danger mb-0">annuler</a>';
                                          
                                        }else{
                                          $b='<i class="fa fa-check fa-2x text-info" aria-hidden="true"></i>';
                                        }
                                         echo ' 
                                                  <div class="notifi-item">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[3].'</h4>

                                                       <div class="row w-100 ">
                                                       
                                                       <div class="col-9 justify-content-start ">
                                                        <h4>a emprente votre livre '.$ligne44[2].' referance '.$ligne33[1].'</h4>
                                                       </div>
                                                       <div class="col-2 justify-content-start ">
                                                       '.$b.'
                                                       </div>
                                                       </div>
                                                      
                                                      
                                                      
                                                       <p>date : '.$ligne33[2].'</p>
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

                 <i class="fa fa-comments" aria-hidden="true"><span class="text-danger"></span> </i>
                 

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
$b ='<a href="messagerieB.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


/*********************************commentaire                    ************************** */ 

if ($type == 'admin'){

  echo ' 
  <div class="notifi-item ">
     <img src="'.$img.'" alt="img">
     <div class="text">
       <h3>'.$type.' <p> '.$username.' </p> </h4>

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
}else{

echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
           <h3>'.$username.'</h4>

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
}
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
$b ='<a href="messagerieB.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


/*********************************commentaire                    ************************** */ 


if ($type == 'admin'){

  echo ' 
  <div class="notifi-item ">
     <img src="'.$img.'" alt="img">
     <div class="text">
       <h3>'.$type.' <p> '.$username.' </p> </h4>

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
}else{

echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
           <h3>'.$username.'</h4>

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
}
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
<h1><span class="grtitre2"><span class="cl">M</span>odi<span class="cl">f</span>ier<span class="cl"> Liv</span>re</span></h1>
        <p>modification d'un livre</p>
    </div>

    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
      <label> image : </label> <br/>
      <input type="file" name="avatar" /> <br/><br/>
    <label for="exampleInputEmail1">referance</label>
    <input type="number" name="rf" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[0];} ?>"  placeholder="entrer referance" required>
    <small id="emailHelp" class="form-text text-muted">le referance de livre</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">titre</label>
    <input type="text" name="titre" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[2];}?>" placeholder="entrer titre" required>
    <small id="emailHelp" class="form-text text-muted">le titre de livre</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">date</label>
    <input type="text" name="date" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[3];}?>"  placeholder="entrer date yyyy-dd-mm" required>
    <small id="emailHelp" class="form-text text-muted">la date d'edition</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">categorie</label>
    <input type="text" name="categorie" class="form-control" id="exampleInputEmail1" value="<?php  if($ligne) {echo $ligne[4];} ?>"  placeholder="entrer categorie" required>
    <small id="emailHelp" class="form-text text-muted">le type de livre</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">nombre de point</label>
    <input type="text" name="nbpt" class="form-control" id="exampleInputEmail1" value="<?php  if($ligne) {echo $ligne[6];} ?>"  placeholder="entrer nombre de point" required>
    <small id="emailHelp" class="form-text text-muted">les points necessaire pour preter ce livre</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">nombre d'exemplaire</label>
    <input type="number" name="nbrexp" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[5];}?>" placeholder="entrer nombre exemplaire" required>
    <small id="emailHelp" class="form-text text-muted">le nombre d'exemplaire de ce livre</small>
  </div>


  

  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <textarea class="form-control"  name="descs" placeholder="description du livre" required><?php if($ligne) {echo $ligne[8];}?></textarea>
    <small id="emailHelp" class="form-text text-muted">la description de ce livre</small>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1">l'etat de livre</label>

  <select name="etat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          <option value="Neuf" name="etat">Neuf</option>
          <option value="Comme neuf" name="etat">Comme neuf</option>
          <option value="Tres bon etat" name="etat">Tres bon etat</option>
          <option value="Bon etat" name="etat">Bon etat</option>
          <option value="etat acceptable" name="etat">etat acceptable</option>
   
       </select>
       <small id="emailHelp" class="form-text text-muted">preciser l'etat de ce livre</small>
   </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="ok">Submit</button>
</form>

</div>









<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>



   <?php
    
    if(isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])){
  
      $aa = "select count(*) from livre2";
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
    
      $avatar = 'images/'.$cid.'.'.$extensionsvalides;
      
      if (file_exists($avatar)) {
          if (unlink($avatar)) {
          } else {
            echo "
            <script>   alert('error');</script>";
          }
      }
      
    
    
     if($_files['avatar']['size'] <= $taillemax){
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsvalides)){
        $chemin = "images/".$cid.".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
        
        if($resultat){ 
          $cavatar = $iduser.".".$extensionUpload;
          
         
          
          $updateavatar = "UPDATE livre2 set srcimage = '$chemin' where idlivree=$idl and iduser=$idu ";
          if(!mysqli_query($con, $updateavatar)){
             echo "
               <script>   alert('error');</script>";
               }
        }else{
          $msg = "erreur durant l'importation de votre photo de profile";
          ?>
          <script> alert('erreur durant importation de votre photo'); </script>;
          <?php
        }
    
      }else{
        $msg = "votre photo de doit etre de format jpg jpeg gif ou pnj";
        ?>
        <script> alert('votre photo de doit etre de format jpg jpeg gif ou pnj'); </script>;
        <?php
      }
    
    }else{
      $msg = "votre photo de ne doit pas depassée 2mo";
      ?>
      <script> alert('votre photo de ne doit pas depassée 2mo'); </script>;
      <?php
    }
    
    }
    
    if(isset($_POST['ok'])){
      $rf =$_POST["rf"];
      $titre =$_POST["titre"];
      $date =$_POST["date"];
      $categorie =$_POST["categorie"];
      $nbrexp =$_POST["nbrexp"];
      $etat =$_POST["etat"];
      $decs =$_POST["descs"];
      $nbpt =$_POST["nbpt"];
    /*
      if($categorie=='informatique'){
        $nbpt=20;
      }elseif($categorie=='medcine'){
        $nbpt=30;
      }elseif($categorie=='langue'){
        $nbpt=10;
      }elseif($categorie=='sport'){
        $nbpt=8;
      }
      else{
        $nbpt=5;
      }
    */
    
      $rver = "select * from livre where  ref='$rf' ";
      $resver = mysqli_query($con,$rver);
      if(!$resver){
        echo "
        <script>   alert('error4444');
        
        </script>";
        
      }else{
    
        if($resver->num_rows==0){
    
          $reqcomp = "INSERT INTO livre (ref) VALUES ('$rf')";
        
          $v=mysqli_query($con, $reqcomp);  
    
        }
      }
    
    
    
        
            $req2 = "UPDATE livre2 set idlivree='$rf',titre='$titre',datedition='$date',categorie='$categorie',nbrexemplaire='$nbrexp',pointe='$nbpt',etat='$etat',description='$decs' where idlivree=$idl and iduser=$idu";
        
           if(mysqli_query($con, $req2)){
    
            $reqlr = "select * from livre2 where  idlivree='$ligne[0]' ";
            $resqlr = mysqli_query($con,$reqlr);
            if(!$resqlr){
              echo "
              <script>   alert('error4444');
              
              </script>";
              
            }else{
              if($resqlr->num_rows==0){
                $reqt2 = "delete from livre where ref ='$ligne[0]'";
                $res2 = mysqli_query($con,$reqt2);
                if(!$res2){
                  echo"error5555";
                }else{
                
             echo "
             <script>   alert('votre livre est bien modifie');</script>";
             echo "
             <script>   window.location.href = 'bibliotheque.php';</script>";
    
               }
          
                }else{
                  echo "
                  <script>   alert('votre livre est bien modifie');</script>";
                  echo "
                  <script>   window.location.href = 'bibliotheque.php';</script>";
         
                }
            }
    
           }
           else{
            echo "
            <script>   alert('error');</script>";
           }
           
       
    
    
          }
    

?>


<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>

<section class="wavsection mt-5">


<img src="ressources/ac.png" class="logo1">

    
<ul class="footer-liste">
  <li><a href="https://www.facebook.com/Micro.Club.USTHB/" target="_blank"><i class="fa fa-facebook fa-1x"></i></a></li>
  <li><a href="https://www.youtube.com/channel/UCoC4e-jxPVtk1S2vtByFXWg" target="_blank"><i class="fa fa-youtube fa-1x"></i></a></li>
  <li><a href="https://twitter.com/MicroClub2015" target="_blank"><i class="fa fa-twitter fa-1x"></i></a></li>
  <li><a href="https://goo.gl/maps/3dw6j3Hv2DR8igZw8" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
  <li><a href="https://livre.net/" target="_blank"><i class="fa fa-google-plus fa-1x"></i></a></li>
  <li><a href="https://www.instagram.com/livre/" target="_blank"><i class="fa fa-instagram fa-1x"></i></a></li>

</ul>
<p class="footer-text">copyright &copy;2023 all right recervid right yahia anis </p>

    
  


    <div class="wave wave1">

    </div>

    <div class="wave wave2">

    </div>

    <div class="wave wave3">

    </div>

    <div class="wave wave4">

    </div>

</section>

<script src="js/tr.js"></script>
<script src="js/tr2.js"></script>

</body>
</html>

