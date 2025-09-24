<?php
$file=fopen("numeros.txt","w");
for ($i=1; $i < 11; $i++) { 
   fwrite($file,"$i\n");
 
}
fclose($file);
?>