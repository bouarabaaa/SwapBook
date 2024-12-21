



<!DOCTYPE html>
<html>
<head>
  <title>Quizy</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="qz.css?v=<?php echo time();?>">
  <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
</head>

<body>


<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["quizy"][0];

    $reqt = "select * from offrequizy";



$res = mysqli_query($con,$reqt);
if(!$res){
  echo"error";
 }


  $reqt2 = "select * from user where id='$iduser'";

 $res2 = mysqli_query($con,$reqt2);
 if(!$res2){
   echo"error";
  }else{
    $ln = mysqli_fetch_array($res2);
  }

  $reqt33 = "select * from demquizy ";




    
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
              <a class="nav-link" href="quizy.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item ">
              <a class="nav-link" href="ajouteroffre.php">ajouter offre <span class="sr-only">(current)</span></a>
            </li>






            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                 <i class="fa fa-bell" aria-hidden="true"><span class="text-danger"></span></i>

              </a>
              <div class="dropdown-menu p-2 notify" aria-labelledby="navbarDropdown">





              

              <?php 

                              if($res33->num_rows>0){


                                while($ligne33=mysqli_fetch_array($res33)){
                                  

                                     $reqt22 = "select * from user  where id = '$ligne33[1]'";
                                     $reqt44 = "select * from offrequizy where  idoffre ='$ligne33[0]'";

                                     $res22 = mysqli_query($con,$reqt22);
                                     $res44 = mysqli_query($con,$reqt44);
                                     
                                     if(!$res22 || !$res44){
                                       echo"error";
                                      }else{
                                         $ligne22=mysqli_fetch_array($res22);
                                         $ligne44=mysqli_fetch_array($res44);
                                         
                                         $idlm=encrypt($ligne22[0], $key);
                                         $idum=encrypt($iduser, $key);
      

                                          

                                         echo ' 
                                                  <div class="notifi-item ">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[3].'</h4>

                                                       <div class="row w-100">
                                                       
                                                       <div class="col-10 w-100">
                                                       <h4>a demande offre '.$ligne44[0].' pendant '.$ligne44[2].' avec reduction de '.$ligne44[3].'</h4>
                                                       </div>
                                                       <div class="col-1 w-100">
                                                       <a href="messagerieQ?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mr-1">contact</a>
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
$b ='<a href="messagerieQ.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


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
$b ='<a href="messagerieQ.php?idul='.$idlm.'&iduserl='.$idum.'" class="btn btn-primary mb-0">repondre</a>';


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

      <div class="text-center m-2">
        <h1>QUIZY</h1>
    </div>


      </div>















      <div class="row  mt-2 ml-5 mr-5">
          <div class="col-lg-3 col-sm-12">

              <div class="sidebar bg-dark">
             <div class="card__image sd">
               <img src="<?php echo $ln[9];?>" alt="card image">
             </div>

             <div class="card__content sd">
               <h4 class="card__title sd text-primary"><?php echo $ln[3];?></h4>
               <h5 class="card__name sd text-light"><?php echo $ln[1];?> <?php echo $ln[2];?></h5>
               <p class="card__text sd text-light"><?php echo $ln[8];?></p>
               <p class="card__text sd text-light"><?php echo $ln[6];?></p>
               
               
               <div class="dropdown sh">
                      <button class="btn btn2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        profil
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                          <a class="dropdown-item active" href="#">profil</a>
                          <a class="dropdown-item" href="modifierprofilqz.php">modifier</a>
                          <a class="dropdown-item" href="connexionuser.php">deconnecter</a>
  
                      </div>
               </div>


             </div>

              </div>
        
          </div>
    

        <!--jai fait lg md sm pour respecter respence-->
          <div class="col-lg-8 col-sm-12 m-5 ">


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
              
            echo '






            <div class="swiper-slide">
            
            <h3 class="card-title text-primary">QUIZY '.$ligne[0].'</h3>
            <p class="card-text text-light">dure: '.$ligne[2].'</p>
            <p class="card-text text-light">reduction : '.$ligne[3].'</p>
            <p class="card-text text-light">min point : '.$ligne[4].'</p>
            <h5 class="card-text text-light"> '.$ligne[5].'</h5>
            <a href="modifieroffre.php?ido='.$ligne[0].'" class="btn btn-primary mb-0">modifier</a>
            <a href="suppoffre.php?ido='.$ligne[0].'" class="btn btn-warning mb-0">supprimer</a>
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
  
</div>













<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script><!--card slide-->
    <script src="ap.js"></script><!--card slide-->


</body>
</html>

