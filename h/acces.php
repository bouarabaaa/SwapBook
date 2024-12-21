

<?php

if($_SERVER['HTTP_REFERER'] == 'http://localhost/text.php'){

    session_start();
    echo 'hello '.$_SESSION['user'][1].' welcom to our room';
    foreach($_SESSION['user'] as $ligne) 
    {
          echo "<br> $ligne <br>"; 
    }



}
else
{
    echo 'cette page non disponible';
}



