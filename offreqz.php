
<!DOCTYPE html>
<html>
<head>
  <title>Offre Quizy</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="qz.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
</head>

<body>


<?php
include "connexion.php";



    session_start();
    

    $iduser = $_SESSION["user"][0];
    
    $reqt2 = "select * from user where id='$iduser'";
    $res2 = mysqli_query($con,$reqt2);
    if(!$res2){
      echo"error";
     }else{
       $ln = mysqli_fetch_array($res2);
       
     }
     $scor = $ln[7];


    $reqt = "select * from offrequizy";




/*$reqt = "select max(id) from projet";*/
$res = mysqli_query($con,$reqt);
if(!$res){
  echo"error";
 }



 $reqt33 = "select * from demlivre where idlctlivre = '$iduser' and affiche='0' order by valide";




 /*$reqt = "select max(id) from projet";*/
 $res33 = mysqli_query($con,$reqt33);
 if(!$res33){
   echo"error";
  }

  function encrypt($data, $key) {
    $iv = '1234567812345678';
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
  }
  

$key = "MaCleDeCryptage";


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

            <li class="nav-item">
              <a class="nav-link" href="offreqz.php">quizy</a>
            </li>

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

                                                       <div class="row d-flex flex-row">
                                                       
                                                       <div class="col-9 p-2">
                                                        <h4>a emprente votre livre '.$ligne44[2].' referance '.$ligne33[1].'</h4>
                                                       </div>
                                                       <div class="col-2 p-2">
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







    <div class="row m-5">
      <div class="col-lg-4 col-sm-12 m-2">
      <h1 class="text-primary mb-3">QUIZY</h1>
      <hr>
      <hr>
      <p class="text-secondary">Plateforme d'education destine aux etudiant en science medicale<br>la reussite sur un clic<br>
      Disponible sur telephone,tablette,PC <br> Vous trouverez sur cette page des offres de reduction sur les abonnements quizy
      <br>Activer un offre sur notre site <br>vous recevez le compte d'acces <br>
    </p>
      <a href="https://quizy-dz.com/login" class="btn btn-outline-primary" role="button" aria-pressed="true">visiter site</a>
      

      </div>



      <div class="col-lg-7 col-sm-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner qz" style="height: 500px;">
            <div class="carousel-item active" style="height:100%;">
              <img class="d-block w-100" src="imgqz/1.png" alt="First slide" style="height:100%;width:100%">
            </div>
            <div class="carousel-item" style="height:100%;">
              <img class="d-block w-100" src="imgqz/2.png" alt="First slide" style="height:100%;width:100%">
            </div>
            <div class="carousel-item" style="height:100%;">
              <img class="d-block w-100" src="imgqz/3.png" alt="First slide" style="height:100%;width:100%">
            </div>
            <div class="carousel-item" style="height:100%;">
              <img class="d-block w-100" src="imgqz/4.png" alt="First slide" style="height:100%;width:100%">
            </div>
            <div class="carousel-item" style="height:100%;">
              <img class="d-block w-100" src="imgqz/5.png" alt="First slide" style="height:100%;width:100%">
            </div>
            <div class="carousel-item" style="height:100%;">
              <img class="d-block w-100" src="imgqz/6.png" alt="First slide" style="height:100%;width:100%">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        
      </div>
      




    </div>


<!--card-->
<div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
    <h1> <span data-text="OffresQuizy" class="grtitre">OffresQuizy</span> </h1>
        <p>you find all our prjects her</p>
    </div>


    <section>
    <!-- Slider main container -->
  <div class="swiper">
  <div class="swiper-wrapper">
            <!-- Slides -->

        <!--jai fait lg md sm pour respecter respence-->

        <?php 

        if($res->num_rows>0){
          while($ligne=mysqli_fetch_array($res)) 

          {
              if($scor>=$ligne[4]){$color = 'primary';}else{$color = 'danger';}
              $ido=encrypt($ligne[0], $key);
              $idu=encrypt($iduser, $key);
              $pt=encrypt($ligne[4], $key);
              
            echo '






            <div class="swiper-slide">
            
            <h3 class="card-title text-primary">QUIZY</h3>
            <p class="card-text text-light">duree: '.$ligne[2].'</p>
            <p class="card-text text-light">reduction : '.$ligne[3].'</p>
            <p class="card-text text-light">min point : '.$ligne[4].'</p>
            <p class="card-text text-light">description : '.$ligne[5].'</p>
            <a href="demqz.php?ido='.$ido.'&idu='.$idu.'&pt='.$pt.'" class="btn btn-'.$color.'">activer offre</a>
                
            </div>

          
';
  
 }

        }



                ?>
      </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    </div>
</section>


</div>






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

<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script><!--card slide-->
    <script src="ap.js"></script><!--card slide-->


</body>
</html>
