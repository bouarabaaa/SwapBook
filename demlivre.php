



<!DOCTYPE html>
<html>
<head>
  <title>Demande Livre</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
</head>

<body>


<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["user"][0];
    $risug = "select * from user where id='$iduser'";
    $reseihuh = mysqli_query($con,$risug);
    if(!$reseihuh){
      echo"error";
     }else{
       $ln = mysqli_fetch_array($reseihuh);
       
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

    if(!empty($_GET["idl"] && $_GET["idu"] && $_GET["pt"] && $_GET["nbex"])){


      $idl = decrypt($_GET["idl"],$key);
      $idu = decrypt($_GET["idu"],$key);
      $pt = decrypt($_GET["pt"],$key);
      $nbex = decrypt($_GET["nbex"],$key);



      if($nbex>0){
        $reqt = "select score from user where id = '$iduser'";
        $res = mysqli_query($con,$reqt);
        if(!$res){
            echo"error rqt1";
         }
         else{
            $ligne=mysqli_fetch_array($res);
            if($ligne[0]>=$pt){
              $ladate=date('y-m-d');
                $reqt2 = "INSERT INTO demlivre (idlecteur,idlivr,datedem,idlctlivre,valide) VALUES ('$iduser','$idl','$ladate','$idu','0')";

                if(mysqli_query($con, $reqt2)){


                                  $nbxrr = $nbex-1;
                                  $reqt4 = "UPDATE livre2 set nbrexemplaire='$nbxrr' where idlivree=$idl and iduser=$idu";


                        $res4 = mysqli_query($con,$reqt4);
                        if(!$res4){
                          echo"error rqt4";

                } else{
                        echo "
                        <script>   alert('la demmande est bien enregistre');</script>";

                        

                        }


                      }else{
                        echo "
                        <script>   alert('vous avez deja demmande ce livre');</script>";                       
                      }
                    }else{
                      echo "
                      <script>   alert('vous n avez pas les points neccessaire pour faire cette demmeande');</script>";
                    }
            }        
      }else{
        echo "
        <script>   alert('le livre est reserve pour le moment');</script>";
      }


      }
                   








    







 
      $reqt33 = "select * from demlivre where idlctlivre = '$iduser' and affiche='0' order by valide";




 /*$reqt = "select max(id) from projet";*/
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

