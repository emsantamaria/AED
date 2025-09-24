<?php
$file="datos.txt";
$fileR="invertido.txt";
$contenido=file_get_contents($file);
file_put_contents($fileR,strrev($contenido));
?>