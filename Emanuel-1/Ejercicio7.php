<?php
   $file= "sumas.txt";
   $contenido=file_get_contents($file);
   echo $contenido;
   $contenido=explode(",",$contenido);
   
   echo array_sum($contenido);
?>