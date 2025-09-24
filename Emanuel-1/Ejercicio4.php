<?php

function crearLeer(array $nombres=[]){
$file=fopen("nombres.txt","w+r");
foreach ($nombres as $key => $value) {
    fwrite($file,"$value \n");
}
$nombres=file_get_contents("nombres.txt");
return $nombres;
}
echo crearLeer(["Jose","Pedro","juan"]);

?>