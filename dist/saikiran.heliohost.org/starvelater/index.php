<?php

     echo "Hello";

     $con = mysqli_connect('johnny.heliohost.org','saikiran_starvelater', 'Gmrit@224','saikiran_starvelater');
     
     if($con) {
         echo "Connected !";
     } else {
         echo "Not connected !";
     }



?>