



<!DOCTYPE html>
<html>
<head>
  <title>Recherche mes livres</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
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
    

    $iduser = $_SESSION["bibliotheque"][0];
    $lv = $_SESSION['livrerecherchebib'];

    
    $limit = 3;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;


    $reqt = "select * from livre2 where (titre like '%$lv%' or idlivree='$lv') and iduser='$iduser' LIMIT $start, $limit";
    $reqttcn = "SELECT count(idlivree) from livre2 where (titre like '%$lv%' or idlivree='$lv') and iduser='$iduser' ";
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


   $res= mysqli_query($con,$reqt);
   if(!$res){
     echo"";
    }


 
 $reqt33 = "select * from demlivre where idlctlivre = '$iduser' and affiche='0' order by valide";




    
 $res33 = mysqli_query($con,$reqt33);
 if(!$res33){
   echo"";
  }


  $reqtttt3 = "select * from demlivre where idlctlivre = '$iduser' and valide='0'";




    
  $ressssss3 = mysqli_query($con,$reqtttt3);
  if(!$ressssss3){
    echo"";
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
              <a class="nav-link" href="bibliotheque.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivrebib.php">ajouter livre</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="statbib.php">Statistique<span class="sr-only">(current)</span></a>
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
                                       echo"";
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






<!--card-->
<div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
        <h1>livres</h1>
        <p>vous allez trouver tous vos livres ici</p>
    </div>


  <div class="row">

        <!--jai fait lg md sm pour respecter respence-->

        <?php 

        if($res->num_rows>0){
                while($ligne=mysqli_fetch_array($res)) 

                {
                    $idl=encrypt($ligne[0], $key);
                    $idu=encrypt($ligne[1], $key);
                  echo '

                  <div class="col-lg-4 col-sm-12">

                  <div class="portofolio-itm">
                     <img src="'.$ligne[7].'" alt="photo">
        
                     <div class="layer">
                         <div class="layer-cntr">
                        
                         
                         <h3 class="card-title text-primary">'.$ligne[2].'</h3>
                         <p class="card-text text-light">type : '.$ligne[4].'</p>
                         <p class="card-text text-light">date :'.$ligne[3].' </p>
                         <p class="card-text text-light">nombre dexemplaire :'.$ligne[5].' </p>
                         <p class="card-text text-light">nombre de point :'.$ligne[6].' </p>
                         <p class="card-text text-light">etat :'.$ligne[9].' </p>
                             <a href="supp.php?idl='.$idl.'&idu='.$idu.'" class="btn btn-primary mb-0">supprimer</a>
                             <a href="modifierlivre.php?idl='.$idl.'&idu='.$idu.'" class="btn btn-primary mb-0">modifier</a>
                             
                         </div>  
                     </div>
                   </div>
               </div> ';
       }

        }



                ?>

  </div>

</div>



<div class="d-flex justify-content-center m-5">
  <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item ">
      <a class="page-link" href="recherchemslvrsbib.php?page=<?= $Previous; ?>" tabindex="-1">Previous</a>
    </li>

    <?php for($i = 1; $i<= $pages; $i++) :
       if ($i==$page) {$pgn = 'active'; 
       }else {$pgn = ''; } 
     ?>
    <li class="page-item <?php echo $pgn; ?>" ><a class="page-link" href="recherchemslvrsbib.php?page=<?= $i; ?>"><?= $i; ?></a></li>

    <?php endfor; ?> 

    <li class="page-item">
      <a class="page-link" href="recherchemslvrsbib.php?page=<?= $Next; ?>" tabindex="-1">Next</a>
    </li>
  </ul>
</nav>
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


  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js?v=<?php echo time();?>"></script><!--card file-->

  <script src="acces.js?v=<?php echo time();?>"></script>

<script src="js/popper.min.js"></script>
 <script src="js/jquery-3.6.3.min.js"></script>
 <script src="js/bootstrap.js"></script>


</body>
</html>