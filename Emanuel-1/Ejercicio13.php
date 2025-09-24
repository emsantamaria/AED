<?php
function canciones(String $cancion){
    $content=explode("\n",file_get_contents("canciones.txt"));
    if(array_search($cancion,$content)===false){
        $content[]=$cancion;
    }
    $file=fopen("canciones.txt","w");
    foreach ($content as $key => $value) {
        fwrite($file,"$value\n");
    }
    fclose($file);
    $i=array_rand($content);
    return $content[$i];
}
echo canciones("Heart-Shaped box");
?>