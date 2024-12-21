



<!DOCTYPE html>
<html>
<head>
  <title>Annuler demande</title>
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

    if(!empty($_GET["idl"] && $_GET["idu"] && $_GET["date"] && $_GET["nbex"] && $_GET["idlct"])){

      $idl = decrypt($_GET["idl"],$key);
      $idu = decrypt($_GET["idu"],$key);
      $date = decrypt($_GET["date"],$key);
      $nbex = decrypt($_GET["nbex"],$key);
      $idlct = decrypt($_GET["idlct"],$key);

      $reqt3 = "delete from demlivre where idlivr='$idl' and idlecteur=$idlct and idlctlivre='$idu' and datedem='$date' and valide='0'";
      $res3 = mysqli_query($con,$reqt3);
      if(!$res3){
        echo"error rqt3";
      }else{

        $k=$nbex+1;
        $re7 = "UPDATE livre2 set nbrexemplaire='$k' where idlivree='$idl' and iduser='$idu' ";
        $rse7 = mysqli_query($con,$re7);
        if(!$rse7){
          echo"error rqt7";
       }else{
        echo "
        <script>   alert('la demmande est annule');</script>";
        echo "
        <script>   window.location.href = 'bibliotheque.php';</script>";
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
        <a class="navbar-brand text-primary" href="#">Anis</a>
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
              <a class="nav-link" href="messagerieB.php">Messagerie<span class="sr-only">(current)</span></a>
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
      
                                          $b ='<a href="annulerdembib.php?idl='.$idl.'&idu='.$idu.'&date='.$date.'&idlct='.$idlct.'&nbex='.$nbex.'" class="btn btn-danger mb-0">annuler</a>';
                                          
                                        }else{
                                          $b='<i class="fa fa-check fa-2x" aria-hidden="true"></i>';
                                        }
                                         echo ' 
                                                  <div class="notifi-item">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[3].'</h4>

                                                       <div class="row">
                                                       
                                                       <div class="col-9">
                                                        <h4>a emprente votre livre '.$ligne44[2].' referance '.$ligne33[1].'</h4>
                                                       </div>
                                                       <div class="col-2">
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

