<?php
function tablaGuardar(int $n){
   $file= fopen("tabla5.txt","r+w");
    for ($i=1; $i <11 ; $i++) { 
        $multiplicacion=$n*$i;
       fwrite($file,"$n x $i = $multiplicacion  \n");
    }
    fclose($file);
    return explode("  ",file_get_contents("tabla5.txt"));
}

$tablas=tablaGuardar(7);
foreach ($tablas as $key => $value) {
    echo "$value \n";
}
?>