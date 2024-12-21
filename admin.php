



<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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

    $reqt = "select * from user where id !='$iduser'";



$res = mysqli_query($con,$reqt);
$res2 = mysqli_query($con,$reqt);
if(!$res){
  echo"error";
 }


 $rt = "select * from user where id ='$iduser'";



 $rs = mysqli_query($con,$rt);
 if(!$rs){
   echo"error";
  }else{
    $ln = mysqli_fetch_array($rs);
  }



   
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


          <form class="form-inline my-2 my-lg-0" methode="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="sear">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="oksear">Search</button>
    </form>
        </div>
      </nav>



      <?php 


if(isset($_GET['oksear']) && !empty($_GET['sear'])){
    $recherche=$_GET["sear"];


    $r2="SELECT * FROM user WHERE username like '%$recherche%' and id!= '$iduser' and typee in ('bibliotheque','lecteur','quizy')";
    $reponse2= $con->query($r2);
    $_SESSION['livrerechercheadmin'] = $recherche;
    if($reponse2->num_rows>0){

      echo '<script>  window.location.href="rechercheuser.php"  </script>';



      }else{
        echo '<script>  alert("cet user nexiste pas")</script>';
      }
   
    
    
    }
    
    ?>






    <div class="row m-5">
      <div class="col-lg-3 col-sm-12">

        <div class="sidebar bg-dark">
             <div class="card__image sd">
               <img src="<?php echo $ln[9];?>" alt="card image">
             </div>

             <div class="card__content sd">
             <h4 class="card__title sd text-primary"><?php echo $ln[3];?></h4>
             <h5 class="card__name sd text-light"><?php echo $ln[1];?> <?php echo $ln[2];?></h5>
             <p class="card__text sd text-light"><?php echo $ln[8];?></p>
             <p class="card__text sd text-light"><?php echo $ln[5];?></p>
             <p class="card__text sd text-light"><?php echo $ln[6];?></p>
               
               
               <div class="dropdown sh">
                      <button class="btn btn2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        profil
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                          <a class="dropdown-item active" href="#">profil</a>
                          <a class="dropdown-item" href="modifierprofil.php">modifier</a>
                          <a class="dropdown-item" href="connexionuser.php">deconnecter</a>
  
                      </div>
               </div>


             </div>

        </div>
        
      </div>





      <div class="col-lg-9 col-sm-12 mt-5 ">
       


<div class="sp">

<div class="row">

    
<section class="swiper mySwiper">

<div class="swiper-wrapper">

<?php

if($res2->num_rows>0){



    while($ligneres=mysqli_fetch_array($res2)){
      $ratprt="select * from demlivre where idlctlivre='$ligneres[0]' or idlecteur='$ligneres[0]'";
      $resprt = mysqli_query($con,$ratprt);
      $idusg=encrypt($iduser, $key);
      $idvsg=encrypt($ligneres[0], $key);
      if(!$resprt){
          echo"error";
       }

       $ratprt158="select * from signale where idv='$ligneres[0]'";
       $resprt158 = mysqli_query($con,$ratprt158);
       if(!$resprt158){
           echo"error";
        }

       $rqtout="select * from demlivre";
       $restout = mysqli_query($con,$rqtout);
       if(!$restout){
           echo"error";
        }

        $toutdem=$restout->num_rows;

       $prt=$resprt->num_rows;
       if($ligneres[6]=="lecteur" || $ligneres[6]=="bibliotheque"){
          $persnt=($prt*100)/$toutdem.'%';
          $nrsignale=$resprt158->num_rows." signals";
      
      
      }else{
        $persnt="";
        $nrsignale="";
      
      }
       
      if($ligneres[6]=="lecteur"){$point=$ligneres[7]." points"; $nrsg=$nrsignale;}else{$point="";$nrsg="";}
      
              echo '      <div class="card swiper-slide">
  <div class="card__image">
    <img src="'.$ligneres[9].'" alt="card image">
  </div>

  <div class="card__content">
    <span class="card__title">'.$ligneres[6].'</span>
    <span class="card__name">'.$ligneres[3].'</span>
    <span class="card__name">'.$ligneres[1].' '.$ligneres[2].'</span>
    <span class="card__name">'.$ligneres[8].'</span>
    <span class="card__name">'.$ligneres[11].'</span>
    <span class="card__name">'.$ligneres[5].'</span>
    <span class="card__name">'.$point.'</span>
    <span class="card__name text-danger">'.$nrsg.'</span>
    <span class="card__name text-secondary">'.$persnt.'</span>
    
    <span class="card__name text-secondary">'.$ligneres[12].'</span>



               
    <div class="btn-group dropup sh">
    <button class="btn btn2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        <a class="dropdown-item" href="affcntl.php?idus='.$ligneres[0].'&tp='.$ligneres[6].'">afficher</a>
        <a class="dropdown-item" href="messagerieA.php?idul='.$idvsg.'&iduserl='.$idusg.'">contacter</a>
        <a class="dropdown-item" href="suppuser.php?idu='.$ligneres[0].'">supprimer</a>

    </div>
    </div>



    




  </div>
</div>';




}
}




?>






</div>
</section>


</div>

</div>
  </div>




    </div>






    <div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>

<script>

  function updatesig(){
    <?php
    $upsig="update signale set lu=1";
    $resupsig = mysqli_query($con,$upsig);
    if(!$resupsig){
      echo"error";
     }


    ?>
  }


 
</script>

    <script src="js/tr.js"></script>
<script src="js/tr2.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="app.js"></script>


<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>


</body>
</html>

