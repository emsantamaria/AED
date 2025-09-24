<?php
 $file="datos.txt";
 file_put_contents($file,"Hola Mundo desde PHP");
 $datos=file_get_contents(filename: $file);
 echo $datos;
?>