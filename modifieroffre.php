
<?php

include "connexion.php";
session_start();
$iduser = $_SESSION["quizy"][0];




if(!empty($_GET["ido"])){

    $ido = $_GET["ido"];
    $reqt = "select * from offrequizy where idoffre ='$ido'";
    


    $res = mysqli_query($con,$reqt);
    if(!$res){
        echo"error";
     }
    else{

        $ligne=mysqli_fetch_array($res);

    }


    $reqt33 = "select * from demquizy ";




    
    $res33 = mysqli_query($con,$reqt33);
    if(!$res33){
      echo"error";
     }



}
//$i = $res2->num_rows;
?>


<!DOCTYPE html>
<html>
<head>
  <title>Modification d'un offre</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
</head>

<body>



<?php
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

<div class="text-center m-5">
        <h1>Modifier offre</h1>
        <p>modifier offre quizy</p>
    </div>

      <form method="POST">
      <div class="form-group">
    <label for="exampleInputEmail1">duree</label>
    <input type="text" name="dure" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[2];} ?>"  placeholder="entrer votre duree">
    <small id="emailHelp" class="form-text text-muted">modifier votre duree</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">reduction</label>
    <input type="text" name="reduction" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[3];}?>" placeholder="entrer votre reduction">
    <small id="emailHelp" class="form-text text-muted">modifier votre reduction</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">point</label>
    <input type="text" name="point" class="form-control" id="exampleInputEmail1" value="<?php  if($ligne) {echo $ligne[4];} ?>"  placeholder="entrer votre point">
    <small id="emailHelp" class="form-text text-muted">modifier votre point</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <textarea name="description" class="form-control" id="exampleInputEmail1" value="<?php if($ligne) {echo $ligne[5];}?>" placeholder="entrer votre description"></textarea>
    <small id="emailHelp" class="form-text text-muted">modifier votre description </small>
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


if(isset($_POST['ok'])){
  $dure =$_POST["dure"];
  $reduction =$_POST["reduction"];
  $point =$_POST["point"];
  $description =$_POST["description"];
    
        $req2 = "UPDATE offrequizy set dure='$dure',reduction='$reduction',pointt='$point',descriptionn='$description' where idoffre=$ido";
    
       if(mysqli_query($con, $req2)){


         echo "
         <script>   alert('votre offre est bien modifie');</script>";


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
