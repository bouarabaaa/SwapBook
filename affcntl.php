



<!DOCTYPE html>
<html>
<head>
  <title>Affichage continue</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css?v=<?php echo time();?>"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
</head>

<body>


<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["admin"][0];




if(!empty($_GET["idus"] && $_GET["tp"])){

    $idus = $_GET["idus"];
    $tp = $_GET["tp"];
    if($tp == 'lecteur' || $tp == 'bibliotheque'){
         $reqt = "select * from livre2 where iduser ='$idus'";
    }
    else{
        $reqt = "select * from offrequizy where idadminqz ='$idus'";
    }
   
    


    $res = mysqli_query($con,$reqt);
    if(!$res){
        echo"error";
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
    


}
//$i = $res2->num_rows;
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

<?php
            if($tp=='bibliotheque'){
              echo '            <li class="nav-item">
              <a class="nav-link" href="afstatbib.php?idus='.$idus.'&tp='.$tp.'">stat-bibliotheque <span class="sr-only"></span></a>
            </li>';
            }
            
            
            ?>







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



<!--card-->
<div class="container">
<?php
if($tp == 'lecteur' || $tp == 'bibliotheque'){
  echo '    <div class="text-center m-5">
  <h1>livres</h1>
</div>';
}else{
  echo '    <div class="text-center m-5">
  <h1>offres</h1>
</div>';
}

?>



  <div class="row m-5">

        <!--jai fait lg md sm pour respecter respence-->

        <?php 

        if($res->num_rows>0){
            


              echo ' <div class=" swiper mySwiper">
                     <div class="swiper-wrapper">';


                while($ligne=mysqli_fetch_array($res)) 

                {

                  if($tp == 'lecteur' || $tp == 'bibliotheque'){
;
                  
                    echo '

                  <div class="swiper-slide portofolio-itm mr-2">


                     
                  <img src="'.$ligne[7].'" alt="Card image cap">
                  <div class="layer">
                  <div class="layer-cntr">
                  <h3 class="card-title text-primary">'.$ligne[0].'</h3>
           <h3 class="card-title text-primary">'.$ligne[2].'</h3>
           <p class="card-text text-light">type : '.$ligne[4].'</p>
           <p class="card-text text-light">date :'.$ligne[3].' </p>
           <p class="card-text text-light">nombre dexemplaire :'.$ligne[5].' </p>
           <p class="card-text text-light">nombre de point :'.$ligne[6].' </p>
             </div>
             </div>
           

              </div>  ';
                  }else{

                    echo '

                    <div class="swiper-slide portofolio-itm mr-2">
  
  
                       
                    <img src="bk.png" alt="Card image cap">
                    <div class="layer">
                    <div class="layer-cntr">
                    <h3 class="card-title text-primary">Quizy '.$ligne[0].'</h3>
             <h3 class="card-title text-primary">'.$ligne[2].'</h3>
             <p class="card-text text-light">reduction : '.$ligne[3].'</p>
             <p class="card-text text-light">min point :'.$ligne[4].' </p>
             <p class="card-text text-light">desc :'.$ligne[5].' </p>
               </div>
               </div>
             
  
                </div>  ';

                  }




       }echo '</div> 
              </div> ';

            
                

        }



                ?>

  </div>

</div>

<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>


<script src="js/tr.js"></script>
<script src="js/tr2.js"></script>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js?v=<?php echo time();?>"></script>

<script src="acces.js?v=<?php echo time();?>"></script>


<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>


</body>
</html>

