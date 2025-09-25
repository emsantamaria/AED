<?php
function excusas(): array{
    $content=explode("\n",file_get_contents("excusas.txt"));
    return $content;
}
function addExcusa(String $excusa): bool{
    $content=excusas();
    if(array_search($excusa,$content)===false){
        $content[]=$excusa;
        $file=fopen("excusas.txt","w");
        foreach ($content as $key => $value) {
            fwrite($file,"$value\n");
        }
        fclose($file);
        return true;
    }
    return false;
}
function excusasRan(): string{
    $content=excusas();
    $index=array_rand($content);
    return $content[$index];
}
echo excusasRan()
?>