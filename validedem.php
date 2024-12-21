



<!DOCTYPE html>
<html>
<head>
  <title>Validation demande</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animation.css">
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

    if(!empty($_GET["idl"] && $_GET["idu"] && $_GET["pt"] && $_GET["tp"] && $_GET["date"] && $_GET["nbex"])){

      $idl = decrypt($_GET["idl"],$key);
      $idu = decrypt($_GET["idu"],$key);
      $pt = decrypt($_GET["pt"],$key);
      $tp = decrypt($_GET["tp"],$key);
      $date = decrypt($_GET["date"],$key);
      $nbex = decrypt($_GET["nbex"],$key);


        $reqt = "select score from user where id = '$iduser'";
        $res = mysqli_query($con,$reqt);
        if(!$res){
            echo"error rqt1";
         }
         else{
            $ligne=mysqli_fetch_array($res);

            if($pt<=$ligne[0]){

                    $d = $ligne[0]-$pt;
                    $reqt3 = "UPDATE user set score='$d' where id=$iduser";
                    $res3 = mysqli_query($con,$reqt3);
                    if(!$res3){
                      echo"error rqt3";
                    }else{      
                                $re7 = "UPDATE demlivre set valide='1' where idlivr='$idl' and idlecteur=$iduser and idlctlivre='$idu' and datedem='$date' ";
                                $rse7 = mysqli_query($con,$re7);
                                if(!$rse7){
                                  echo"error rqt7";
                               }else{

                            if($tp=='lecteur'){

                               $reqt7 = "select score from user where id = '$idu'";
                               $res7 = mysqli_query($con,$reqt7);
                               if(!$res7){
                                   echo"error rqt7";
                                }else{
                                 $ligne7=mysqli_fetch_array($res7);
                                 $de = $ligne7[0]+$pt;
 
                               $reqt6 = "UPDATE user set score='$de' where id=$idu";
                               $res6 = mysqli_query($con,$reqt6);
                               if(!$res6){
                                 echo"error rqt6";
                              }
                              else{





                      if($nbex<1){

                        $req878 = "UPDATE demlivre set affiche='1' where idlivr='$idl' and idlecteur=$iduser and idlctlivre='$idu' and datedem='$date' ";
                        $res789 = mysqli_query($con,$req878);
                        if(!$res789){
                          echo"error rqt799";
                       }

                        $reqlr = "select * from livre2 where  idlivree=$idl and iduser !=$idu and nbrexemplaire >0";
                        $resqlr = mysqli_query($con,$reqlr);
                        if(!$resqlr){
                          echo "
                          <script>   alert('error4444');
                          
                          </script>";
                          
                        }
                        else{
                        if($resqlr->num_rows==0){
                        $reqt4 = "delete from livre where ref ='$idl'";

                                    

                        }else{
                          $reqt4 = "delete from livre2 where idlivree=$idl and iduser=$idu";
                        }
                  
                        $res4 = mysqli_query($con,$reqt4);
                        if(!$res4){
                          echo"error rqt4";

                       } else{
                        echo "
                        <script>   alert('la demmande est bien valide');</script>";
                        

                        }

                        
                        }





                      }else{
                        echo "
                        <script>   alert('la demmande est bien valide');</script>";
                        
                      }





                              }

                               } 



                            }else{

                              if($nbex<1){

                                $reqlr = "select * from livre2 where  idlivree=$idl and iduser !=$idu and nbrexemplaire >0";
                                $resqlr = mysqli_query($con,$reqlr);
                                if(!$resqlr){
                                  echo "
                                  <script>   alert('error4444');
                                  
                                  </script>";
                                  
                                }
                                else{
                                if($resqlr->num_rows==0){
                                $reqt4 = "delete from livre where ref ='$idl'";
        
                                            
        
                                }else{
                                  $reqt4 = "delete from livre2 where idlivree=$idl and iduser=$idu";
                                }
                          
                                $res4 = mysqli_query($con,$reqt4);
                                if(!$res4){
                                  echo"error rqt4";
        
                               } else{
                                echo "
                                <script>   alert('la demmande est bien valide');</script>";
                                
        
                                }
        
                                
                                }
        
        
        
        
        
                              }else{
                                echo "
                                <script>   alert('la demmande est bien valide');</script>";
                                
                              }
                              
                            }
                               }


                           }

            }else{
                echo "
                <script>   alert('vous n avez pas les points neccessaire pour  valider la demmeande');</script>";

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
                                     $reqt44 = "select titre from livre2  where iduser = '$iduser' and idlivree='$ligne33[1]'";

                                     $res22 = mysqli_query($con,$reqt22);
                                     $res44 = mysqli_query($con,$reqt44);
                                     if(!$res22 || !$res44){
                                       echo"error";
                                      }else{
                                         $ligne22=mysqli_fetch_array($res22);
                                         $ligne44=mysqli_fetch_array($res44);
                                         echo ' 
                                                  <div class="notifi-item">
                                                     <img src="'.$ligne22[9].'" alt="img">
                                                     <div class="text">
                                                       <h3>'.$ligne22[0].'</h4>
                                                       <h4>a emprente votre livre '.$ligne44[0].' referance '.$ligne33[1].'</h4>
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

