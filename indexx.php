<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"><!--file icone-->
    <link rel="stylesheet" href="footer.css?v=<?php echo time();?>">
</head>
<body>







<?php
include 'mail.php';
include "connexion.php";



        $reqt = "select * from user where typee='lecteur'";
        
        

        $res = mysqli_query($con,$reqt);
        if(!$res){
        echo"error";
         }


         $reqt1 = "select * from livre2 ";
        
        

         $res1 = mysqli_query($con,$reqt1);
         if(!$res1){
         echo"error";
          }


          
         $reqt2 = "select * from offrequizy ";
        
        

         $res2 = mysqli_query($con,$reqt2);
         if(!$res2){
         echo"error";
          }


?>










<div class="homme">



            
    <div class="lignes">

        <h1 class="titre">SwapBook</h1>
    </div>

    <div class="container-first">
        <h1 class="des"><span>vous </span><span>pouvez </span><span>lire </span><span>plus</span></h1>

        <p class="desc">vous pouvez lire plusieurs livres et les partager avec d'autre lecteurs , profiter des livres gratuits  dans des <br> bibliotheques reconu,
            profiter des offres quizy gratuits et avec réduction magnifique
        </p>

        <div class="container-btns">
            <button class="btn-first b1" onclick="conx()">connexion </button>
            <button class="btn-first b2" onclick="cont()">inscription</button>
        </div>
    </div>

    <img src="ressources/ac.png" class="logo">


    <ul class="medias">
        <li class="bulle"><img src="ressources/fb.svg" class="logo-medias" onclick="fb()"></li>
        <li class="bulle"><img src="ressources/insta.svg" class="logo-medias" onclick="ins()"></li>
        <li class="bulle"><img src="ressources/yt.svg" class="logo-medias" onclick="yt()"></li>
    </ul>

</div>


    <div class="container">
    <div class="text-center m-5">
        <h1>Livre proposés</h1>
        <p>les livres a echangés</p>
    </div>

        <div class="row mt-5 mb-5">


<div class=" swiper mySwiper">
                     <div class="swiper-wrapper">';






                <div class="swiper-slide portofolio-itm mr-2">   
                <img src="images/book1.jpg" alt="Card image cap">
                <div class="layer">
                <div class="layer-cntr">
         <h3 class="card-title text-primary">Anthony S</h3>
         <p class="card-text text-light">medecine</p>
         <p class="card-text text-light">2000-01-01 </p>
             <a href="connexionuser.php" class="btn btn-primary mb-0">afficher</a>
           </div>
           </div>
            </div> 


            <div class="swiper-slide portofolio-itm mr-2">   
                <img src="images/book2.jpg" alt="Card image cap">
                <div class="layer">
                <div class="layer-cntr">
         <h3 class="card-title text-primary">Computer Networking</h3>
         <p class="card-text text-light">informatique</p>
         <p class="card-text text-light">2012-05-12 </p>

         <a href="connexionuser.php" class="btn btn-primary mb-0">afficher</a>
           </div>
           </div>
            </div> 


            <div class="swiper-slide portofolio-itm mr-2">   
                <img src="images/book3.jpg" alt="Card image cap">
                <div class="layer">
                <div class="layer-cntr">
         <h3 class="card-title text-primary">English Grammar in Use</h3>
         <p class="card-text text-light">langue</p>
         <p class="card-text text-light">2018-06-08 </p>

         <a href="connexionuser.php" class="btn btn-primary mb-0">afficher</a>
           </div>
           </div>
            </div> 







            </div>
         

         </div> 



        </div>
        </div>


        <div class="text-center m-5">
        <h1>information</h1>
        <p>les information pour notre admine</p>
    </div>

    <div class="number">

        <div class="overly">

            <div class="row m-4 ">
            

                <div class="col-lg-4 info" style="text-align: center;">
    
                    <i class="fa fa-phone fa-2x"></i>
                    <h2>phone</h2>
                    <p>06 65 65 65 65</p>
    
    
                </div>
    
    
                <div class="col-lg-4 info" style="text-align: center;">
    
                    <i class="fa fa-envelope fa-2x"></i>
                    <h2>email</h2>
                    <p>anisyaya44@gmail.com</p>
    
                    
                </div>
    
    
                <div class="col-lg-4 info" style="text-align: center;">
    
                    <i class="fa fa-map-marker fa-2x"></i>
                    <h2>adresse</h2>
                    <p>BP 32 El Alia 16111 Bab Ezzouar, Alger.</p>
    
                    
                </div>
            </div>
    
    
    
        </div>



    </div>






    <div class="container mb-5 mt-5">
    <div class="text-center m-5">
        <h1>Offre Quizy</h1>
        <p>les offres quizy proposés</p>
    </div>
        <div class="row">

            <?php
    $i=0;
    if($res2->num_rows>3){



          while($ligner=mysqli_fetch_array($res2)){
            if($i<3){
                $mg="";
                if($i==1){$mg="mg";}

echo'
    <div class="pricing-itms '.$mg.' mb-5">
            <span class="pricing-text">offre quizy</span>
            <div class="pricing-por">
              <h3 class="dollar">$'.$ligner[4].'</h3>
              <span class="months">'.$ligner[2].'</span>
            </div>
            <ul class="pricing-list">
               <li>pour etudiant</li><li>specialise en medecine</li><li>compte gratuit</li>
            </ul>
            <a href="connexionuser.php" class="btn btn-outline-primary pt-2">afficher</a>

          </div>';

          $i++;
        }



}
}




  ?>






          <div class="claire"></div>

        </div>


    </div>












<div class="container">


<div class="text-center m-5">
        <h1>contact</h1>
        <p>contacter nous</p>
    </div>


    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
    <label for="exampleInputEmail1">nom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="nom" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
            </div>
            <div class="col-lg-6">
            <div class="form-group">
    <label for="exampleInputEmail1">prenom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="prenom" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
            </div>
        </div>




  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
      <label for="exampleInputPassword1">subject</label>
      <textarea class="form-control" placeholder="Enter subject" name="subject" required></textarea>
    </div>
  <div class="form-group">
      <label for="exampleInputPassword1">message</label>
      <textarea class="form-control" placeholder="Enter message" name="message" required></textarea>
    </div>

    <div class="form-group">
      <input type="file" name="file">
      <small id="emailHelp" class="form-text text-muted">entrer un fichier,photo,... </small>
    </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

  <div class="col-12 mb-3  mt-3">
      <?php echo $alert ?>
    </div>
</form>

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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="app.js?v=<?php echo time();?>"></script>

    <script src="js/popper.min.js"></script>
   <script src="js/jquery-3.6.3.min.js"></script>
   <script src="js/bootstrap.js"></script>
</body>
</html>