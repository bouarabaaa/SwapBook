



<!DOCTYPE html>
<html>
<head>
  <title>Statistiaue</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
</head>

<body dir="ltr">


<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["admin"][0];

    $reqt = "select * from user where typee = 'lecteur'";
    $reqt3 = "select * from user where typee = 'bibliotheque'";

    $reqt2 = "select * from user";
    
    $reqt4 = "select * from livre2";
    $reqt5 = "select id from user where typee='lecteur'";
    $reqt8 = "select * from demlivre";

    $reqt9 = "select * from offrequizy";
    $reqt10 = "select * from offrequizy where reduction  ='100%'";
    
    $reqt11 = "select * from user where sexe  ='male'";
    $reqt12 = "select * from user where sexe  ='femelle'";
    $adult=date("Y")-18;

    $reqt13 = "select * from user where EXTRACT(YEAR FROM datenaissance) > $adult";

    


$res = mysqli_query($con,$reqt);
$res2 = mysqli_query($con,$reqt2);
$res3 = mysqli_query($con,$reqt3);
$res4 = mysqli_query($con,$reqt4);
$res5 = mysqli_query($con,$reqt5);
$res8 = mysqli_query($con,$reqt8);
$res9 = mysqli_query($con,$reqt9);
$res10 = mysqli_query($con,$reqt10);

$res11 = mysqli_query($con,$reqt11);
$res12 = mysqli_query($con,$reqt12);
$res13 = mysqli_query($con,$reqt13);
if(!$res || !$res2 || !$res3 || !$res4 || !$res5 || !$res8 || !$res9 || !$res10 || !$res11 || !$res12 || !$res13){
  echo"error";
 }
else{
    $b = $res3->num_rows * 100;
    $l = $res->num_rows * 100;
    $j = $res2->num_rows;
    if($j==0){
          $prl = 0;
          $prb = 0;
    }else{
      $prl = $l / $j;
      $prb = $b / $j;
    }


    $nbl = $res4->num_rows;
    $nbllw = $res8->num_rows;


    $nboq = $res9->num_rows;
    $g = $res10->num_rows;
    $gg = $res10->num_rows * 100;
    if($nboq==0){
      $og = 0;
      $ong = 0;
    }else{
      $og = $gg / $nboq;
      $ng = ($nboq - $g) * 100;
      $ong = $ng / $nboq;
    }
    $ng = ($nboq - $g) * 100;



    $ln = mysqli_fetch_array($res5);
    $reqt6 = "select * from livre2 where iduser='$ln[0]'";
    $res6 = mysqli_query($con,$reqt6);
    if(!$res6){
      echo 'error';
    }else{
      $nllt=$res6->num_rows;
    }


    $reqt7 = "select * from livre2 where iduser !='$ln[0]'";
    $res7 = mysqli_query($con,$reqt7);
    if(!$res7){
      echo 'error';
    }else{
      $nlbb=$res7->num_rows;
    }

    $totallivre= $nlbb+$nllt;

    $male=$res11->num_rows;
    $femelle=$res12->num_rows;
    $enfant=$res13->num_rows;
    
    

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





  <div class="container">
      <div class="row m-5">
      <div class="col-lg-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header"><i class="fa fa-male fa-2x" aria-hidden="true"></i></div>
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <h5 class="card-title">male</h5>
              </div>
              <div class="col-3">
              <h5 class="card-title text-warning"><?php echo $male;?></h5>
              </div>              
            </div>
            <p class="card-text">le nombre de user (male) inscrit dans ce site.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header"><i class="fa fa-female fa-2x" aria-hidden="true"></i></div>
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <h5 class="card-title">femelle</h5>
              </div>
              <div class="col-3">
              <h5 class="card-title text-warning"><?php echo $femelle;?></h5>
              </div>              
            </div>
            <p class="card-text">le nombre de user (femelle) inscrit dans ce site.</p>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header"><i class="fa fa-child fa-2x" aria-hidden="true"></i></div>
          <div class="card-body">
            <div class="row">
              <div class="col-9">
              <h5 class="card-title">enfant</h5>
              </div>
              <div class="col-3">
              <h5 class="card-title text-warning"><?php echo $enfant;?></h5>
              </div>              
            </div>
            <p class="card-text">le nombre de user (-18 ans) inscrit dans ce site</p>
          </div>
        </div>
      </div>
      
      
    </div>
 </div> 
    
    
    
 <div class="container mt-5 mb-5">
 

      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Livre</h3>                    
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg"><?php echo $totallivre;?></span>
                  <span>total de livre</span>
                </p>  
              </div>
              <!-- /.d-flex -->
              
              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>  
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Users</h3>   
              </div>
            </div>    
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span id="totalsalarys" class="text-bold text-lg"><?php echo $j;?></span>
                <span>total user</span>
                </p>
                  
                </div>
                <!-- /.d-flex -->
                
                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="160"></canvas>
                </div>
                
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> lecteur
                    <p id="soldtotals"></p>     
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> bibliotheque
                    <p id="rentedtotals"></p>
                  </span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- /.col-md-6 -->
        </div>
      <!-- /.row -->


      
      
      <div class="card mt-4">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Quizy</h3>                    
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg"><?php echo $nboq;?></span>
                  <span>total offre quizy</span>
                </p>  
              </div>
              <!-- /.d-flex -->
              <div class="progress mt-5">
                <div class="progress-bar progress-bar-striped progress-bar-animated"    style="width: <?php echo $og ?>%">gratuit <?php echo $og ?>% </div>
             </div>

      
            <div class="progress mt-3">
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"    style="width: <?php echo $ong ?>%">reduit <?php echo $ong ?>% </div>
           </div>
              
 
            </div>
        </div>

      
</div>







 
    

<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>

<script src="js/tr.js"></script>
<script src="js/tr2.js"></script>
    
    
    
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
      

 
  


$(function () {
  'use strict'
 
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')

  var salesChart  = new Chart($salesChart, {

    type   : 'bar',
    
    data   : {

      labels  : [
          

        'detail user',

      ],


      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [ 
               '<?php echo $prl;?>',
          ]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [ 
                '<?php echo $prb;?>',
          ]
        }
      ]
    },

   
   
   options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return '%' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  });
  
 var pieChart = document.getElementById('visitors-chart').getContext('2d')

  var myPieChart = new Chart(pieChart, {
    type: 'pie',
    data: {
      datasets: [{
        data: ['<?php echo $nllt?>','<?php echo $nlbb?>','<?php echo $nbllw?>'],
        backgroundColor :["#27c100","#f3545d","#fdaf4b"],
        borderWidth: 10,
        
      }],
      labels: ['livre lecteur', 'livre bibliotheque', 'livre demmande'] 
    },
    options : {
      responsive: true, 
      maintainAspectRatio: false,
      legend: {
        position : 'bottom',
        labels : {
          fontColor: '#000',
          fontSize: 15,
          usePointStyle : true,
          padding:30
        }
      },
      pieceLabel: {
        render: 'percentage',
        fontColor: 'white',
        fontSize: 14,
      },


    }
  })

})


    </script>

    
    
  </body>
  </html>
  
  
