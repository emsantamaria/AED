<?php

function getAnimales(){
    $file="animales.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function getComidas(){
    $file="comidas.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function getLugares(){
    $file="lugares.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function getPlantillas(){
    $file="plantillas.txt";
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function random(array $lugares,array $comidas,array $animales,array $plantillas){
    $indexL=array_rand($lugares);
    $indexC=array_rand($comidas);
    $indexA=array_rand($animales);
    $indexP=array_rand($plantillas);
    return[$lugares[$indexL],$comidas[$indexC],$animales[$indexA],$plantillas[$indexP]];
}
function completar(){
    $listAll=random(getLugares(),getComidas(),getAnimales(),getPlantillas());
    $plantilla=$listAll[3];
    $animal=$listAll[2];
    $comida=$listAll[1];
    $lugar=$listAll[0];
    $plantilla=str_replace("[animal]",$animal,$plantilla);
    $plantilla=str_replace("[lugar]",$lugar,$plantilla);
    $plantilla=str_replace("[comida]",$comida,$plantilla);
    return $plantilla;
}
echo completar();
?>