



<!DOCTYPE html>
<html>
<head>
  <title>Affichage livre</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
  <link rel="stylesheet" href="css3/style.css?v=<?php echo time();?>"><!--portfolio and card-->
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

    // Fonction de cryptage
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

    if(!empty($_GET["idl"] && $_GET["idu"] && $_GET["pt"] && $_GET["nbex"] && $_GET["ttr"])){
      $idlc = $_GET["idl"];
      $iduc = $_GET["idu"];
      $ptc = $_GET["pt"];
      $nbexc = $_GET["nbex"];
      $ttrc = $_GET["ttr"];
      
        $idl = decrypt($_GET["idl"],$key);
        $idu = decrypt($_GET["idu"],$key);
        $pt = decrypt($_GET["pt"],$key);
        $nbex = decrypt($_GET["nbex"],$key);
        $ttr = decrypt($_GET["ttr"],$key);
    
        $reqt = "select * from user where id = '$idu'";
        $res = mysqli_query($con,$reqt);
        if(!$res){
            echo"error";
        }else{
            $ligne=mysqli_fetch_array($res);
        }


        $reqtt = "select * from livre2 where idlivree='$idl' and iduser = '$idu'";
        $ress = mysqli_query($con,$reqtt);
        if(!$ress){
            echo"error";
        }else{
            $lignee=mysqli_fetch_array($ress);
        }


        $mots = explode(' ',str_replace(array('-',',','.'),' ',$ttr));
        $separateurs = "/\.\-+/";
        $ch=preg_replace($separateurs, " ",$ttr);

        $nbrmots=str_word_count($ch);

        $reqlated="select * from livre2 where idlivree !='$idl' and iduser != '$iduser' and categorie='$lignee[4]' LIMIT $start, $limit";
        $reqttcn = "SELECT count(idlivree) from livre2 where idlivree !='$idl' and iduser != '$iduser' and categorie='$lignee[4]'";
        $reslated = mysqli_query($con,$reqlated);
        if(!$reslated){
        echo"error";
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













<!--description-->
<div class="container">

        <!--jai fait ca pour separer les deux container -->
        <div class="text-center m-5">
      
        <section>
          <h1 class="tr">
          <span>D</span>
          <span>e</span>
          <span>s</span>
          <span>c</span>
          <span>r</span>
          <span>i</span>
          <span>p</span>
          <span>t</span>
          <span>i</span>
          <span>o</span>
          <span>n</span>
          </h1>


        </section>
            <p> description </p>
        </div>

    <div class="card mb-3 box-des" >
        <div class="row no-gutters" style="height: 550px;">

        <div class="col-lg-5 col-sm-12" style="height: 100%;">
               <div class="card-body">


               <div class="row">
                <div class="col-lg-5 col-sm-12">
                     <div class="card__image">
                  <img src="<?php echo $ligne[9]; ?> " alt="card image">
                </div>
                </div>

                <div class="col-lg-6 col-sm-12 mt-1">
                  
                <h3 class="card-title text-primary"><?php echo $ligne[3]; ?> </h3>
                <h5 class="card-title text-secondary"><?php echo $ligne[1]; ?>  <?php echo $ligne[2]; ?> </h5>
                <p class="card-text text-secondary">type :<?php echo $ligne[6]; ?></p>
                <p class="card-text text-secondary">ville :<?php echo $ligne[5]; ?>    <a href="<?php echo $ligne[10]; ?>" target="_blank"><i class="fa fa-map-marker fa-x ml-1" aria-hidden="true"></i></a></p>
                
                </div>
               </div>


            



                 <h3 class="card-title ml-4"><?php echo $lignee[2]; ?></h3>
                 <h6 class="card-title ml-4">date d'edition : <?php echo $lignee[3]; ?></h6>
                 <h6 class="card-title ml-4">categorie : <?php echo $lignee[4]; ?></h6>
                 <h6 class="card-title ml-4">nombre de point : <?php echo $lignee[6]; ?></h6>
                 <h6 class="card-title ml-4">etat : <?php echo $lignee[9]; ?></h6>
                 
                 
                 <p class="card-text description text-secondary ml-4"><?php echo $lignee[8]; ?></p>
                 <div class="dropdown sh ml-4 mt-2">
                      <button class="btn btn2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        action
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                      <a href="demlivre.php?idl=<?php echo $idlc; ?>&idu=<?php echo $iduc; ?>&pt=<?php echo $ptc; ?>&nbex=<?php echo $nbexc; ?>" class="dropdown-item">demande</a>
<?php
                      /*********************************commentaire                    ************************** */

$idlm=encrypt($idu, $key);
$idum=encrypt($iduser, $key);


/*********************************commentaire                    ************************** */ 
?>
                      <a class="dropdown-item" href="messagerie.php?idul=<?php echo $idlm; ?>&iduserl=<?php echo $idum;?>">contact</a>
                     
                      </div>
               </div>

                
                




               </div>
        </div>


        <div class="col-lg-7 col-sm-12" style="height: 100%;">
 
            <img class="card-img h-100" src="<?php echo $lignee[7]; ?>" alt="Card image cap" style="width:100%;height: 350px;">


        </div>
        </div>
 


    </div>
</div>

<div class="container mt-5 ">
  <div class="row">
    <div class="col-1"><h2 class="text-secondary">tags:</h2> <hr> </div>
    <div class="col-2 mt-2"><a class="btn btn-outline-secondary w-100 h-80" href="tag.php?usr=<?php echo $ligne[3]; ?>"><?php echo $ligne[3]; ?></a> </div>
    <?php

    for($n=0;$n<$nbrmots;$n++){
    echo  '<div class="col-2 mt-2"><a class="btn btn-outline-secondary w-100 h-80" href="tag.php?tr='.$mots[$n].'">'.$mots[$n].'</a> </div>';

    }

    ?>

  </div>
</div>



<div class="container">


<div class="text-center m-5">

       <section>
          <h1 class="tr tr2">
          <span>C</span>
          <span>o</span>
          <span>m</span>
          <span>m</span>
          <span>e</span>
          <span>n</span>
          <span>t</span>
          <span>a</span>
          <span>i</span>
          <span>r</span>
          <span>e</span>
          <span>s</span>
          </h1>


        </section>

            <p> commentaires </p>
</div>

<form method = "post">
  <div class="form-group m-3">
    <label for="exampleInputEmail1">commentaire</label>
    <input type="text" name="cmt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter comment">
    <small id="emailHelp" class="form-text text-muted">votre avis sur ce livre</small>
  </div>



  <button type="submit" class="btn btn-primary m-3" name="okc">Submit</button>
</form>

<div class="container comment m-3">
<?php

$rqt3 = "select * from comment where idlv='$idl' and iduslv ='$idu'";
$res3 = mysqli_query($con,$rqt3);
if(!$res3){
    echo"error";
}else{
   while($ligne2=mysqli_fetch_array($res3)) {

    $rqt7 = "select * from user where id = '$ligne2[1]'";
    $res7 = mysqli_query($con,$rqt7);
if(!$res7){
    echo"error";
}else{
  $ligne7=mysqli_fetch_array($res7);
      echo "<div class='row'>

                <div class='col-1'>
                       <div class='card__image comm'>
                           <img src='".$ligne7[9]."' alt='card image'>
                       </div>
                 </div>

       <div class='col-10 ml-0 mt-0'><h3 class='text-primary'> ".$ligne7[3]." </h3>
       <p class='text-secondary' style='font-size:13px'>le ".$ligne2[4]."</p>
       </div>
       <div class='col-12 ml-1'>
       <h6> ".$ligne2[5]."</h6> 
       </div>
    </div>";
}

   }
}




?>

</div>

<?php




if(isset($_POST['okc']) && isset($_POST['cmt'])){
  $cmt =$_POST["cmt"];

  $req = "INSERT INTO comment (idus,idlv,iduslv,messagee) VALUES ('$iduser','$idl','$idu','$cmt')";
    
  if(mysqli_query($con, $req)){


    echo "
    <script>   alert('commentaire est bien envoye');
               window.location.href = 'conslivre.php?idl=".$idlc."&idu=".$iduc."&pt=".$ptc."&nbex=".$nbexc."&ttr=".$ttrc."';
    </script>";
    
    

  }
  else{
   echo "
   <script>   alert('error11111');</script>";
  }


}

?>





</div>



<!--description-->
<div class="container">

        <!--jai fait ca pour separer les deux container -->
        <div class="text-center m-5">
      
        <section>
          <h1 class="tr">
          <span>L</span>
          <span>i</span>
          <span>v</span>
          <span>r</span>
          <span>e</span>
          <span>s</span>
          <span>C</span>
          <span>o</span>
          <span>n</span>
          <span>n</span>
          <span>e</span>
          <span>x</span>
          <span>e</span>
          <span>s</span>
          </h1>


        </section>
            <p> des livres qui ont la meme categorie </p>
        </div>




<div class="container">
<div class="row">

<?php 


$i=1;
if($reslated->num_rows>0){
while($linted=mysqli_fetch_array($reslated)) 

{
$idlcs=encrypt($linted[0], $key);
$iducs=encrypt($linted[1], $key);
$ptcs=encrypt($linted[6], $key);
$nbexcs=encrypt($linted[5], $key);
$ttrcs=encrypt($linted[2], $key);

echo '
    <div class="col-lg-4 col-sm-12">

      <div class="portofolio-itm">
         <img src="'.$linted[7].'" alt="photo">

         <div class="layer">
             <div class="layer-cntr">
             <span class="ctgr">livre</span>
             <h3 class="layer-title">'.$linted[2].'</h3>
             <a href="conslivre.php?idl='.$idlcs.'&idu='.$iducs.'&pt='.$ptcs.'&nbex='.$nbexcs.'&ttr='.$ttrcs.'" class="btn btn-primary">afficher</a> 
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
</div>
   





<div class="d-flex justify-content-center m-5">
  <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item ">
      <a class="page-link" href="conslivre.php?page=<?= $Previous; ?>&idl=<?= $idlc; ?>&idu=<?= $iduc; ?>&pt=<?= $ptc; ?>&nbex=<?= $nbexc; ?>&ttr=<?= $ttrc; ?>" tabindex="-1">Previous</a>
    </li>

    <?php for($i = 1; $i<= $pages; $i++) :
       if ($i==$page) {$pgn = 'active'; 
       }else {$pgn = ''; } 
     ?>
    <li class="page-item <?php echo $pgn; ?>" ><a class="page-link" href="conslivre.php?page=<?= $i; ?>&idl=<?= $idlc; ?>&idu=<?= $iduc; ?>&pt=<?= $ptc; ?>&nbex=<?= $nbexc; ?>&ttr=<?= $ttrc; ?>"><?= $i; ?></a></li>

    <?php endfor; ?> 

    <li class="page-item">
      <a class="page-link" href="conslivre.php?page=<?= $Next; ?>&&idl=<?= $idlc; ?>&idu=<?= $iduc; ?>&pt=<?= $ptc; ?>&nbex=<?= $nbexc; ?>&ttr=<?= $ttrc; ?>" tabindex="-1">Next</a>
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
<script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
 



</body>
</html>
