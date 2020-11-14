<?php

       //conexion a la base de datos 
       $connection = new mysqli("localhost","root","","aplicacion_web");
       if($connection ->connect_errno)
       {
           echo "error de conexion";
           exit;
       }


?>

