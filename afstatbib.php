<!DOCTYPE html>
<html>
<head>
	<title>Statistiaue Bibliotheque</title>
    <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->

</head>
<body>

<?php
include "connexion.php";


    session_start();
    

    $iduser = $_SESSION["admin"][0];


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
   

    if(!empty($_GET["idus"] && $_GET["tp"])){

        $idus = $_GET["idus"];
        $tp = $_GET["tp"];

       

    $reqt = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where ville='alger')";
    

    $reqt1 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where ville='anaba')";
    
    $reqt3 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where ville='bejaia')";
    
    $reqt4 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where ville!='bejaia' and ville!='alger' and ville!='anaba')";
    
    $enfant=date("Y")-10;
    $adult=date("Y")-20;

    $reqt5 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where EXTRACT(YEAR FROM datenaissance) <= $enfant and EXTRACT(YEAR FROM datenaissance) >= $adult )";

   
    $normal=date("Y")-30;

    $reqt6 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where EXTRACT(YEAR FROM datenaissance) < $adult and EXTRACT(YEAR FROM datenaissance) >= $normal )";

    $plusnormal=date("Y")-40;

    $reqt7 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where EXTRACT(YEAR FROM datenaissance) < $normal and EXTRACT(YEAR FROM datenaissance) >= $plusnormal  )";

    $reqt8 = "select distinct (idlecteur) from demlivre where idlctlivre='$idus' and idlecteur in (select id from user where EXTRACT(YEAR FROM datenaissance) < $plusnormal  )";



    $reqtlv = "select distinct (idlivr) from demlivre where idlctlivre='$idus' and valide='0'";
    $reqtlv1 = "select distinct (idlivr) from demlivre where idlctlivre='$idus' and valide='1'";
    $reqtlv2 = "select idlivree from livre2 where iduser='$idus' and idlivree not in (select idlivr from demlivre where idlctlivre='$idus')";

    $reqtotlv1 = "select sum(nbrexemplaire) from livre2 where iduser='$idus' ";
    $reqdiflv2 = "select distinct (idlivree) from livre2 where iduser='$idus' ";


    $r1 = "select * from demlivre where idlctlivre='$idus' and idlivr in (select idlivree from livre2 where iduser='$idus' and categorie='medcine')";
    $r2 = "select * from demlivre where idlctlivre='$idus' and idlivr in (select idlivree from livre2 where iduser='$idus' and categorie='informatique')";
    $r3 = "select * from demlivre where idlctlivre='$idus' and idlivr in (select idlivree from livre2 where iduser='$idus' and categorie='langue')";
    $r4 = "select * from demlivre where idlctlivre='$idus' and idlivr in (select idlivree from livre2 where iduser='$idus' and categorie='sport')";
    $r5 = "select * from demlivre where idlctlivre='$idus' and idlivr in (select idlivree from livre2 where iduser='$idus' and categorie not in ('sport','medcine','informatique','langue'))";


    $totallivrdmnd = "select * from demlivre where idlctlivre='$idus' ";
    $restotallivrdmnd = mysqli_query($con,$totallivrdmnd);
$res = mysqli_query($con,$reqt);
$res1 = mysqli_query($con,$reqt1);
$res3 = mysqli_query($con,$reqt3);
$res4 = mysqli_query($con,$reqt4);
$res5 = mysqli_query($con,$reqt5);

$res6 = mysqli_query($con,$reqt6);
$res7 = mysqli_query($con,$reqt7);
$res8 = mysqli_query($con,$reqt8);

$reslv = mysqli_query($con,$reqtlv);
$reslv1 = mysqli_query($con,$reqtlv1);
$reslv2 = mysqli_query($con,$reqtlv2);

$rs1= mysqli_query($con,$r1);
$rs2 = mysqli_query($con,$r2);
$rs3 = mysqli_query($con,$r3);
$rs4 = mysqli_query($con,$r4);
$rs5 = mysqli_query($con,$r5);

$restotlv = mysqli_query($con,$reqtotlv1);
$resdiflv = mysqli_query($con,$reqdiflv2);
if(!$res || !$res1 || !$res3 || !$res4 || !$res5 || !$res6 || !$res7 || !$res8 || !$restotlv || !$resdiflv || !$rs1 || !$rs2 || !$rs3|| !$rs4 || !$rs5 || !$restotallivrdmnd ){
  echo"error";
 }
else{
  $alger=$res->num_rows;
  $anaba=$res1->num_rows;
  $bejaia=$res3->num_rows;
  $autre=$res4->num_rows;
  $totalclient=$autre+$bejaia+$anaba+$alger;

  $ad=$res5->num_rows;
  $ad1=$res6->num_rows;
  $ad2=$res7->num_rows;
  $ad3=$res8->num_rows;

  $lv=$reslv->num_rows;
  $lv1=$reslv1->num_rows;
  $lv2=$reslv2->num_rows;
  $lvrdmnd=$lv+$lv1;

  $diflvr=$resdiflv->num_rows;
  $lng1= mysqli_fetch_array($restotlv);



  $ttlvdmd=$restotallivrdmnd->num_rows;
  if($ttlvdmd==0){
    $rscat=0;
    $rscat1=0;
    $rscat2=0;
    $rscat3=0;
    $rscat4=0;
  }
else{
      $rscat=($rs1->num_rows*100)/$ttlvdmd;
  $rscat1=($rs2->num_rows*100)/$ttlvdmd;
  $rscat2=($rs3->num_rows*100)/$ttlvdmd;
  $rscat3=($rs4->num_rows*100)/$ttlvdmd;
  $rscat4=($rs5->num_rows*100)/$ttlvdmd;
}

}


        
    

    
    
    
    
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
              <a class="nav-link" href="afstatbib.php?idu='.$idus.'">stat-bibliotheque <span class="sr-only"></span></a>
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

          </ul>
        </div>
      </nav>









<div class="container mt-5 mb-5">

       <div class="card-header border-0 mt-2 mb-2">
         <div class="d-flex justify-content-between">
           <h3 class="card-title">livre demende par</h3>                    
         </div>
       </div>

 <div class="row">
   <div class="col-lg-6">
     <div class="card">
       <div class="card-header border-0">
         <div class="d-flex justify-content-between">
           <h3 class="card-title">categorie</h3>                    
         </div>
       </div>
       <div class="card-body">
         <div class="d-flex">
           <p class="d-flex flex-column">
           <span class="text-bold text-lg">diffirents livres existes : <?php echo $diflvr;?></span>
             <span>total de livre : <?php echo $lng1[0];?></span>
             <span>total de diffirent livre demende : <?php echo $lvrdmnd;?></span>
             <span>total livre demende : <?php echo $ttlvdmd;?></span>
           </p>  
         </div>
         <!-- /.d-flex -->
         
         <div class="position-relative mb-4">
         <div id="graph1" style="width:500px; height: 400px;"></div>
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
           <h3 class="card-title">validation</h3>                    
         </div>
       </div>
       <div class="card-body">
         <div class="d-flex">
           <p class="d-flex flex-column">
             <span class="text-bold text-lg">diffirents livres existes : <?php echo $diflvr;?></span>
             <span>total de livre : <?php echo $lng1[0];?></span>
             <span>total de diffirent livre demende : <?php echo $lvrdmnd;?></span>
             <span>total livre demende : <?php echo $ttlvdmd;?></span>
           </p>  
         </div>
         <!-- /.d-flex -->
         
         <div class="position-relative mb-4">
         <div id="graph2" style="width:500px; height: 400px;"></div>
         </div>  
       </div>
     </div>
     <!-- /.card -->
   </div>
   <!-- /.col-md-6 -->
   </div>
   </div>


   <div class="container mt-5 mb-5">

<div class="card-header border-0 mt-2 mb-2">
  <div class="d-flex justify-content-between">
    <h3 class="card-title">client par :</h3>                    
  </div>
</div>

<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-header border-0">
  <div class="d-flex justify-content-between">
    <h3 class="card-title">Ville</h3>                    
  </div>
</div>
<div class="card-body">
  <div class="d-flex">
    <p class="d-flex flex-column">
      <span class="text-bold text-lg"><?php echo $totalclient;?></span>
      <span>total client</span>
    </p>  
  </div>
  <!-- /.d-flex -->
  
  <div class="position-relative mb-4">
  <div id="graph3" style="width:500px; height: 400px;"></div>
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
    <h3 class="card-title">Age</h3>                    
  </div>
</div>
<div class="card-body">
  <div class="d-flex">
    <p class="d-flex flex-column">
      <span class="text-bold text-lg"><?php echo $totalclient;?></span>
      <span>total client</span>
    </p>  
  </div>
  <!-- /.d-flex -->
  
  <div class="position-relative mb-4">
  <div id="graph4" style="width:500px; height: 400px;"></div>
  </div>  
</div>
</div>
<!-- /.card -->
</div>
<!-- /.col-md-6 -->
</div>
</div>



<div class="row h-3 w-5" style="width:10%;height:3%;">
  <div class="col-2">
    <div id="google_translate_element"></div>
  </div>
</div>







<script src="js/tr.js"></script>
<script src="js/tr2.js"></script>



<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.js"></script>

	<script>
		// Données pour les graphes
		var trace1 = {
		  x: ['medcine', 'informatique', 'langue', 'sport', 'autre'],
		  y: [<?php echo $rscat; ?>, <?php echo $rscat1; ?>, <?php echo $rscat2; ?>, <?php echo $rscat3; ?>, <?php echo $rscat4; ?>],
		  type: 'bar',
		  name: '',
		  marker: {
		    color: 'rgb(49,130,189)',
		    opacity: 0.7
		  }
		};
		var trace2 = {
		  values: [<?php echo $lv;?>, <?php echo $lv1;?>, <?php echo $lv2;?>],
		  labels: ['livre demende no valide', 'livre demende  valide', 'livre no demende'],
		  type: 'pie',
		  name: 'Répartition diffirents livres demende et no demende',
		  marker: {
		    colors: ['rgb(255,127,14)', 'rgb(44,160,44)', 'rgb(214,39,40)']
		  },
		  hole: .4
		};
		var trace3 = {
		  values: [<?php echo $alger ?>, <?php echo $anaba ?>, <?php echo $bejaia ?>, <?php echo $autre ?>],
		  labels: ['Alger', 'Anaba', 'Bejaia', 'Autres'],
		  type: 'pie',
		  name: 'Répartition des clients',
		  marker: {
		    colors: ['rgb(49,130,189)', 'rgb(204,204,204)', 'rgb(255,127,14)', 'rgb(214,39,40)']
		  },
		  hole: .4
		};

        var trace4 = {
		  x: [10, 20, 30, 40,+50],
		  y: [0, <?php echo $ad;?>, <?php echo $ad1;?>, <?php echo $ad2;?>, <?php echo $ad3;?>],
		  type: 'scatter'
		};

		// Options pour les graphes
		var layout1 = {
		  title: 'Répartition des livres demende par categorie',
		  xaxis: {
		    title: 'categorie'
		  },
		  yaxis: {
		    title: 'pourcentage %'
		  }
		};
		var layout2 = {
		  title: 'Répartition diffirents livres demende et no demende',
		  annotations: [
		    {
		      font: {
		        size: 20
		      },
		      showarrow: false,
		      text: '',
		      x: 0.5,
		      y: 0.5
		    }
		  ],
		  height: 400,
		  width: 450
		};
		var layout3 = {
		  title: 'Répartition des clients par ville',
		  annotations: [
		    {
		      font: {
		        size: 20
		      },
		      showarrow: false,
		      text: '',
		      x: 0.5,
		      y: 0.5
		    }
		  ],
		  height: 400,
		  width: 450,
		  margin: {
		    l: 50,
		    r: 50,
		    b: 100,
		    t: 100,
		    pad: 4
		  },
		  legend: {
		    x: 1,
		    y: 0.5
		  },
		  hole: {
		    size: 0.5
		  }
		};

        var layout4 = {
		  title: 'Répartition des clients par age',
          xaxis: {
            title: 'age'
          },
          yaxis: {
            title: 'nombre de demendeur'
          }
		};

		// Créer les graphes
		Plotly.newPlot('graph1', [trace1], layout1);
		Plotly.newPlot('graph2', [trace2], layout2);
		Plotly.newPlot('graph3', [trace3], layout3);
        Plotly.newPlot('graph4', [trace4], layout4);
	</script>

</body>
</html>
