<?php
function guardar(String $nombre,int $ranking){
    $content=explode("\n",file_get_contents("ranking.txt"));
    $listContent=[];
    foreach ($content as $key => $value) {
        $listContent[]=explode(":",$value);
    }
    $listContent[]=[$nombre," $ranking"];
    $file=fopen("ranking.txt","w");
    foreach ($listContent as $key => $value) {
        for ($i=0; $i < 2; $i++) { 
            if($i%2==0){
                $value[$i]="$value[$i]:";
            }
             fwrite($file,$value[$i]);
        }
           fwrite($file,"\n");
    }
    fclose($file);
}
    guardar("The Witcher",10)
?>