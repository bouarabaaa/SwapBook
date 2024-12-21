<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
    <title>Messagerie</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
    <link rel="stylesheet" href="admin.css?v=<?php echo time();?>">
  <script src="https://ajax.googleapis.com/ajax/Libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>




<?php




/**************************************commentaire **************************** */
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

/**************************************commentaire **************************** */

include "connexion.php";
session_start();
/**************************************commentaire **************************** */
if(!empty($_GET["iduserl"])){
  $iduserl = decrypt($_GET["iduserl"],$key);

 
}

if(!empty($_GET["idul"])){
  $idul = decrypt($_GET["idul"],$key);

 
}

/**************************************commentaire **************************** */

$re = "select * from user where id='$idul'";
  $r = mysqli_query($con, $re);
  $username = mysqli_fetch_array($r);
  if(!mysqli_query($con, $re)){
     echo "
     <script>   alert('error');</script>";
}


?>


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

                 <i class="fa fa-bell" aria-hidden="true" ><span class="text-danger" onclick="updatesig()"></span> </i>

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
$b ='<a href="messagerieA.php?idul='.$idd.'&iduserl='.$iduser.'" class="btn btn-primary mb-0">repondre</a>';
                                          
echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
           <h3>'.$username.'-'.$type.'</h4>

           <div class="row w-100">
           
           <div class="col-9 justify-content-start">
           <h4>vous : '.$msg.'</h4>
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
$b ='<a href="messagerieA.php?idul='.$id.'&iduserl='.$iduser.'" class="btn btn-primary mb-0">repondre</a>';
                                          
echo ' 
      <div class="notifi-item ">
         <img src="'.$img.'" alt="img">
         <div class="text">
         <h3>'.$username.'-'.$type.'</h4>

           <div class="row w-100">
           
           <div class="col-9 justify-content-start">
           <h4>'.$username.' : '.$msg.'</h4>
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
      

        <!--jai fait ca pour separer les deux container -->
        
      
        



<div class="wrapper">
        <div class="title"><?= $username[3]; ?>(<?= $username[6]; ?>)</div>
        <div class="form">
        <?php


$rec = "select * from messagerie where ( id_user1='$iduserl'  and
 id_user2='$idul' ) or ( id_user1='$idul' and id_user2='$iduserl' )
   order by id asc";


$recupmessage = mysqli_query($con,$rec);
if(!$recupmessage){
  echo"error1";
 }else{
    while($messagee=mysqli_fetch_array($recupmessage)){     
      if($messagee[2]==$idul){
    ?>
    <div class="user-inbox inbox">
        <div class="msg-header">
        <p><?= $messagee[3]; ?></p> 
      </div>
    </div>
   <?php 
   }else{
    
    ?>
    <div class="bot-inbox inbox">
    <div class="icon">
    <div class="card__imagee" >
               <img src="<?php echo $username[9];?>" style="width: 2.5em;
    height: 2.5em;
    border-radius: 50%;
    border: 5px solid var(--color);
    margin-bottom: 1em;">
             </div>
                </div>
            <div class="msg-header">
                 <p><?= $messagee[3]; ?></p> 
            </div>
    </div>
   <?php
   }
    }  
    }
    ?> </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" name="message"  placeholder="Type something here.." required>
                <button id="send-btn" name="ok" >Send</button>
            </div>
        </div>
        </div>





        <script>
          $(".form").scrollTop($(".form")[0].scrollHeight);
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
              var n = [];
                var idul = '<?= $idul ?>';
                var iduserl = '<?= $iduserl ?>';
                $value = $("#data").val();
                n.push($value);
                n.push(idul);
                n.push(iduserl);
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                
                $.ajax({
                    url: "message.php",
                    type: "POST",
                    data: { n : JSON.stringify( n ) },
                    success: function(result){
                      
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
                  
            });
        });
      
        
    </script> 




   
  
  



</body>
</html>