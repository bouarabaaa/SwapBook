
<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["user"][0];
$rjinhuo = "select * from user where id='$iduser'";
$jfuhfu = mysqli_query($con,$rjinhuo);
if(!$jfuhfu){
  echo"error";
 }else{
   $ln = mysqli_fetch_array($jfuhfu);
   
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
?>


<!DOCTYPE html>
<html>
<head>
  <title>Supprission</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
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
              <a class="nav-link" href="acces.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivre2.php">ajouter livre</a>
            </li>

            <?php
            
            if($ln[13]=='medcine'){
              echo'            <li class="nav-item">
              <a class="nav-link" href="offreqz.php">quizy</a>
            </li>';
            }
            

            ?>

            <li class="nav-item">
              <a class="nav-link" href="livrebibliotheque.php">bibliotheque</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="acc.php">accueil</a>
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

                                          $idl=encrypt($ligne33[1], $key);
                                          $idu=encrypt($ligne33[3], $key);
                                          $date=encrypt($ligne33[2], $key);
                                          $idlct=encrypt($ligne22[0], $key);
                                          $nbex=encrypt($ligne44[5], $key);
      
                                          $b ='<a href="annulerdem.php?idl='.$idl.'&idu='.$idu.'&date='.$date.'&idlct='.$idlct.'&nbex='.$nbex.'" class="btn btn-danger mb-0">annuler</a>';
                                          
                                        }else{
                                          $b='<i class="fa fa-check fa-2x text-info" aria-hidden="true"></i>';
                                        }
                                         echo ' 
                                                  <div class="notifi-item ">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[3].'</h4>

                                                       <div class="row w-100">
                                                       
                                                       <div class="col-9 justify-content-start">
                                                        <h4>a emprente votre livre '.$ligne44[2].' referance '.$ligne33[1].'</h4>
                                                       </div>
                                                       <div class="col-2 justify-content-start">
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
$b ='<a href="messagerie.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


/*********************************commentaire                    ************************** */ 
if ($type == 'lecteur'){
echo ' 
<div class="notifi-item ">
   <img src="'.$img.'" alt="img">
   <div class="text">
     <h3>'.$username.' </h4>  
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
           <h3>'.$type.' <p> '.$username.' </p>  </h4>  
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

$idlm=encrypt($id, $key);
$idum=encrypt($iduser, $key);
$b ='<a href="messagerie.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';

if ($type == 'lecteur'){
 
  
  echo ' 
  <div class="notifi-item ">
     <img src="'.$img.'" alt="img">
     <div class="text">
       <h3>'.$username.' </h4>  
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
         <h3>'.$type.' <p> '.$username.' </p>  </h4> 

           <div class="row w-100">
           
           <div class="col-9 justify-content-start">
           <h4>'.$type.' : '.$msg.'</h4>
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






<form method="POST">
<h2 class=" m-5 text-danger">vous êtes sûr de vouloir supprimer le livre</h2>
<div class="m-5">
  <input type="submit" value="oui"   class="btn btn-outline-danger"  name="oui"></a>
<a  class="btn btn-outline-primary" href="acces.php" role="button" name="non">non</a>
</div>


</form>


<?php


if(!empty($_GET["idl"] && $_GET["idu"])){

  if(!empty($_POST["oui"])){
    $idl = decrypt($_GET["idl"],$key);
    $idu = decrypt($_GET["idu"],$key);
  $reqt = "select nbrexemplaire from livre2 where idlivree ='$idl' and iduser ='$idu'";


  $res = mysqli_query($con,$reqt);
  if(!$res){
      echo"error";
   }
  else{
    $ligne=mysqli_fetch_array($res);
    if($ligne[0] <= 1){

      $reqlr = "select * from livre2 where  idlivree=$idl and iduser !=$idu and nbrexemplaire >0";
      $resqlr = mysqli_query($con,$reqlr);
      if(!$resqlr){
        echo "
        <script>   alert('error4444');
        
        </script>";
        
      }
      else{
      if($resqlr->num_rows==0){
      $reqt2 = "delete from livre where ref ='$idl'";
      $res2 = mysqli_query($con,$reqt2);
      if(!$res2){
        echo"error5555";
      }else{
      echo "
      <script>   alert('livre est supprime');
      
      </script>";
      echo "
      <script>   window.location.href = 'acces.php';</script>";
     }

      }



      $raq2 = "delete from livre2 where idlivree=$idl and iduser=$idu";
      $ras2 = mysqli_query($con,$raq2);
      if(!$ras2){
        echo"error";
      }else{
      echo "
      <script>   alert('livre est supprime');
      
      </script>";
      echo "
      <script>   window.location.href = 'acces.php';</script>";
     }
      
      }



    }else{
      $nbxr = $ligne[0]-1;
      $reqt3 = "UPDATE livre2 set nbrexemplaire='$nbxr' where idlivree=$idl and iduser=$idu";
      $res3 = mysqli_query($con,$reqt3);
      if(!$res3){
        echo"error";
      }else{
        echo "
        <script>   alert('le nombre dexemplaires est diminuer');</script>";
        echo "
        <script>   window.location.href = 'acces.php';</script>";
     }
    }

  }

  
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
