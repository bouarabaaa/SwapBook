



<!DOCTYPE html>
<html>
<head>
  <title>Recherche</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="admin.css?v=<?php echo time();?>">
</head>

<body>


<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["user"][0];
    $lv = $_SESSION['livrerecherche'];
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


    $reqt = "select * from livre2 where titre like '%$lv%' and iduser!='$iduser' LIMIT $start, $limit";
    $reqttcn = "SELECT count(idlivree) from livre2 where titre like '%$lv%' ";
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
     echo"error";
    }


 $rsuerr = "select * from user where username like '%$lv%' and id!='$iduser' and typee in ('bibliotheque','lecteur')";




    
 $ressuserr = mysqli_query($con,$rsuerr);
 if(!$ressuserr){
   echo"error";
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



      <div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
        <h1>user</h1>
        <p>vous allez trouvez tous les lecteurs et bibliotheque ici</p>
    </div>
    <div class="sp">
    <div class="row">

    <section class="swiper mySwiper">

<div class="swiper-wrapper">

<?php

if($ressuserr->num_rows>0){



    while($ligneres=mysqli_fetch_array($ressuserr)){
      $idusg=encrypt($iduser, $key);
      $idvsg=encrypt($ligneres[0], $key);
      
      if($ligneres[6]=='lecteur'){
        $drmn='       <a class="dropdown-item" href="tag.php?usr='.$ligneres[3].'">consulter</a>
        <a class="dropdown-item" href="messagerie.php?idul='.$idvsg.'&iduserl='.$idusg.'">contacter</a>
        <a class="dropdown-item" href="signaler.php?idusg='.$idusg.'&idvsg='.$idvsg.'">signaler</a>';
      }else{
        $drmn='       <a class="dropdown-item" href="tag.php?usr='.$ligneres[3].'">consulter</a>

        <a class="dropdown-item" href="messagerie.php?idul='.$idvsg.'&iduserl='.$idusg.'">contacter</a>';

      }

      
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
           
    <div class="btn-group dropup sh">
    <button class="btn btn2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        '.$drmn.'

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



<!--card-->
<div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
        <h1>livre</h1>
        <p>vous allez trouvez tous les livres ici</p>
    </div>


  <div class="row">

        <!--jai fait lg md sm pour respecter respence-->

        <?php 

        if($res->num_rows>0){
                while($ligne=mysqli_fetch_array($res)) 

                {
                  $idl=encrypt($ligne[0], $key);
                  $idu=encrypt($ligne[1], $key);
                  $pt=encrypt($ligne[6], $key);
                  $nbex=encrypt($ligne[5], $key);
                  $ttr=encrypt($ligne[2], $key);
                  echo '

        <div class="col-lg-4 col-md-6 col-sm-12 p-1">


        <div class="card h-100" >
        <img class="card-img-top" style="height:240px" src="'.$ligne[7].'" alt="Card image cap">
        <div class="card-body h-45 w-100">
          <h3 class="card-title">'.$ligne[2].'</h3>
          <p class="card-text">categorie : '.$ligne[4].'</p>
          <p class="card-text">min point :'.$ligne[6].' </p>
          <a href="conslivre.php?idl='.$idl.'&idu='.$idu.'&pt='.$pt.'&nbex='.$nbex.'&ttr='.$ttr.'" class="btn btn-primary">afficher</a> 
             
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
      <a class="page-link" href="recherche.php?page=<?= $Previous; ?>" tabindex="-1">Previous</a>
    </li>

    <?php for($i = 1; $i<= $pages; $i++) :
       if ($i==$page) {$pgn = 'active'; 
       }else {$pgn = ''; } 
     ?>
    <li class="page-item <?php echo $pgn; ?>" ><a class="page-link" href="recherche.php?page=<?= $i; ?>"><?= $i; ?></a></li>

    <?php endfor; ?> 

    <li class="page-item">
      <a class="page-link" href="recherche.php?page=<?= $Next; ?>" tabindex="-1">Next</a>
    </li>
  </ul>
</nav>
</div>


<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>

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

