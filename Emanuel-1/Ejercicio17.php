<?php
function adjetivos(){
    $file="adjetivos.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function animales(){
    $file="animales.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}

function adjetivosRan(){
    $content=adjetivos();
    $index=array_rand($content);
    return $content[$index];
}
function animalesRan(){
    $content=animales();
    $index=array_rand($content);
    return $content[$index];
}

function nombreSuper(){
    $adjetivo=adjetivosRan();
    $animal=animalesRan();
    $nombre=$animal+" "+$adjetivo;
    return $nombre;
}
echo nombreSuper();
?>