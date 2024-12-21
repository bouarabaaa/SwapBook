<!DOCTYPE html>
<html>
<head>
  <title>Tags</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css3/style.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
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

      $limit = 3;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $start = ($page - 1) * $limit;
      
    if(!empty($_GET["usr"])){
        $gt='usr';
        $d = $_GET["usr"];
        $reqtuser = "select * from user where id != '$iduser' and username='$d'";
        $resuser = mysqli_query($con,$reqtuser);
        if(!$resuser){
        echo"error";
         }
            $linuser=mysqli_fetch_array($resuser);
            $id=$linuser[0];


         
        $reqt = "select * from livre2 where iduser = '$id' LIMIT $start, $limit";
        $reqttcn = "SELECT count(idlivree) from livre2 where iduser = '$id'";
        
        

        $res = mysqli_query($con,$reqt);
        if(!$res){
        echo"error";
         }







    }elseif(!empty($_GET["tr"])){

        $gt='tr';
        $d=$_GET["tr"];

        $reqt = "select * from livre2 where iduser != '$iduser' and titre like'%$d%' LIMIT $start, $limit";
        $reqttcn = "SELECT count(idlivree) from livre2 where iduser != '$iduser' and titre like '%$d%'";

        $res = mysqli_query($con,$reqt);
        if(!$res){
        echo"error";
         }





    }


    $retcn = mysqli_query($con,$reqttcn);
    if(!$retcn){
      echo"error";
   }else{
     $tot=mysqli_fetch_array($retcn);
     $total = $tot[0];
     $pages = ceil( $total / $limit );
     if($page>1){
       $Previous = $page - 1;
     }else{
       $Previous =1;
     }
     

     if($page<$pages){
       $Next = $page + 1;
     }else{
       $Next = $pages;
     }
      
   }




    $reqt33 = "select * from demlivre where idlctlivre = '$iduser' order by valide";



    $res33 = mysqli_query($con,$reqt33);
    if(!$res33){
      echo"error";
     }



 




 $reqtte = "select * from livre2";
 $resultat1 = mysqli_query($con,$reqtte);
 if(!$resultat1){
   echo"error";
}
else{

 $nb = $resultat1->num_rows;
 $ligneres=mysqli_fetch_array($resultat1);
}



$reqt32 = "select * from demlivre where idlctlivre = '$iduser'";




/*$reqt = "select max(id) from projet";*/
$res32 = mysqli_query($con,$reqt32);
if(!$res32){
  echo"error";
 }

 function encrypt($data, $key) {

  $iv = '1234567812345678';
  $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
  return base64_encode($encrypted . '::' . $iv);
}

$key = "MaCleDeCryptage";


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

                 <i class="fa fa-bell" aria-hidden="true"></i>

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

                                          $idlan=encrypt($ligne33[1], $key);
                                          $iduan=encrypt($ligne33[3], $key);
                                          $datean=encrypt($ligne33[2], $key);
                                          $idlctan=encrypt($ligne22[0], $key);
                                          $nbexan=encrypt($ligne44[5], $key);
      
                                          $b ='<a href="annulerdem.php?idl='.$idlan.'&idu='.$iduan.'&date='.$datean.'&idlct='.$idlctan.'&nbex='.$nbexan.'" class="btn btn-danger mb-0">annuler</a>';
                                          
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




          </ul>

        </div>
      </nav>







<div class="container mt-5">

<div class="row">

<div class="col-12">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<?php 
  $ct=0;
  $cont = ' ';


  
  while($nb>0){

     echo'<li data-target="#carouselExampleIndicators" data-slide-to="'.$ct.'"></li>';
    /* $cont =' '.$cont. '<div class="carousel-item">
<img class="d-block w-100" src="images/event/IMG_8303.JPG" alt="Second slide">
</div>';*/
     $nb--;
     $ct++;
  

  }




  
  ?>
</ol>



<div class="carousel-inner" style="height: 500px;">
<div class="carousel-item active" style="height:100%;">
<img class="d-block" src="<?php echo $ligneres[7] ?>" alt="First slide" style="height:100%;width:100%;">
</div>

<?php


while($ligneres=mysqli_fetch_array($resultat1)){

echo '<div class="carousel-item" style="height:100%;">
<img class="d-block w-100 h-100" src="'.$ligneres[7].'" alt="Second slide" style="height:100%;width:100%;">
</div>';
}


?>

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


</div>
     



<!--card-->
<div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
        <h1><span class="grtitre1">LIVRES</span></h1>
        <p>you find all our books her</p>
    </div>






    
    <div class="row">

    <?php 


$i=1;
if($res->num_rows>0){
  while($ligne=mysqli_fetch_array($res)) 

{
  $idl=encrypt($ligne[0], $key);
$idu=encrypt($ligne[1], $key);
$pt=encrypt($ligne[6], $key);
$nbex=encrypt($ligne[5], $key);
$ttr=encrypt($ligne[2], $key);
    
echo '
        <div class="col-lg-4 col-sm-12">

          <div class="portofolio-itm">
             <img src="'.$ligne[7].'" alt="photo">

             <div class="layer">
                 <div class="layer-cntr">
                 <span class="ctgr">'.$ligne[4].'</span>
                 <h3 class="layer-title">'.$ligne[2].'</h3>
                 <span class="point">'.$ligne[6].'</span>
                 <a href="conslivre.php?idl='.$idl.'&idu='.$idu.'&pt='.$pt.'&nbex='.$nbex.'&ttr='.$ttr.'" class="btn btn-primary">afficher</a> 
                 </div>  
             </div>
           </div>
       </div>
       
       ';
     
     }
    }else{
        echo '<h2>il n ya pas de livre</h2>';
    }
     
     ?>


       
    </div>



</div>




<div class="d-flex justify-content-center m-5">
  <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item ">
      <a class="page-link" href="tag.php?<?= $gt; ?>=<?= $d; ?>&page=<?= $Previous; ?>" tabindex="-1">Previous</a>
    </li>

    <?php for($i = 1; $i<= $pages; $i++) :
       if ($i==$page) {$pgn = 'active'; 
       }else {$pgn = ''; } 
     ?>
    <li class="page-item <?php echo $pgn; ?>" ><a class="page-link" href="tag.php?<?= $gt; ?>=<?= $d; ?>&page=<?= $i; ?>"><?= $i; ?></a></li>

    <?php endfor; ?> 

    <li class="page-item">
      <a class="page-link" href="tag.php?<?= $gt; ?>=<?= $d; ?>&page=<?= $Next; ?>" tabindex="-1">Next</a>
    </li>
  </ul>
</nav>
</div>

<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>

<section class="wavsection">


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

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
 



</body>
</html>

