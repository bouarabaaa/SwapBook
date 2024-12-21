<!DOCTYPE html>
<html>
<head>
  <title>project java script</title>
  <meta charset="utf-8"/>
  <meta name="description" content="practice on javascript part2">
  <!--t9der tktb hna javascript t3k dir haka w tbda tkteb   <script>         </script> -->
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>


<?php
include "connexion.php";



    session_start();
    $ido = $_GET["ido"];
    $idl = $_GET["idl"];
    $scoro = $_GET["scoro"];
    $scorl = $_GET["scorl"];
    if($scoro>$scorl){
        echo "
        <script>   alert('vous avez pas assez de points pour activer cet offre');</script>";
        
    }else{
    
        $reqt = "select * from offrequizy where idoffre=$ido";




/*$reqt = "select max(id) from projet";*/
$res = mysqli_query($con,$reqt);
if(!$res){
  echo"error";
 }
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
              <a class="nav-link" href="acces.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ajoutlivre2.php">ajouter livre</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="offreqz.php">quizy</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="messagerieQ.php">Messagerie<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                profil
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">consulter</a>
                <a class="dropdown-item" href="modifierprofil.php">modifier</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>



<!--card-->
<div class="container">
<!--jai fait ca pour separer les deux container -->
    <div class="text-center m-5">
        <h4>voulez vous vraiment activer cet offre !</h4>
        
    </div>

    <div class="row">

        <!--jai fait lg md sm pour respecter respence-->

        <?php 

        if($res->num_rows>0){
                while($ligne=mysqli_fetch_array($res)) 

                {
              
                  echo '
        

        <div class="col-lg-4 col-md-6 col-sm-12 p-1" >


            <div class="card h-100"  >
                <img class="card-img-top h-50" src="'.$ligne[0].'" alt="Card image cap">
                <div class="card-body">
                  <h3 class="card-title">'.$ligne[0].'</h3>
                  <p class="card-text">dure: '.$ligne[2].'</p>
                  <p class="card-text">reduction : '.$ligne[3].'</p>
                  <p class="card-text">min point : '.$ligne[4].'</p>
                  <p class="card-text">description : '.$ligne[5].'</p>
 
                </div>
              </div>

        </div> ';
      
        
       }

        }
        
        ?>
</div>
<form method="POST">
<div class="text-center m-5">

<button type="submit"  class="btn btn-primary" name="ok">oui</button>
    
<a href="offreqz.php" class="btn btn-primary">non</a>
</div>

</form>

<?php 
    if(isset($_POST['ok'])){ echo "hhh";
              
      
        $scorl = $scorl - $scoro ;
        $reque = "update user set score='$scorl' where id='$idl'";
        if(!mysqli_query($con, $reque)){
             echo "
             <script>   alert('error');</script>";
           }

           $requ = "INSERT INTO demandequizy (id_demandeur,id_offre) 
           VALUES ('$idl','$ido')";

        if(mysqli_query($con, $requ)){

         echo "
         <script>   alert('votre compte sera bientot delivrée');</script>";
        }
         else{
          echo "
          <script>   alert('error');</script>";
        }
           header('location:offreqz.php');
}



?>
</body>
</html>