<?php
function aniadir(String $nombre){
    $file="nombres.txt";
    $contenido=explode("  ",file_get_contents("nombres.txt"));
    if(array_search("$nombre  ",$contenido)===false){
        $contenido[]="$nombre  ";
    }
    $file=fopen($file,"w+r");
    foreach ($contenido as $key => $value) {
        fwrite($file,$value);
    }
    fclose($file);
    return $contenido;
}
$list=aniadir("pepito");
foreach ($variable as $key => $value) {
    # code...
}
?>