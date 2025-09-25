<?php
function chistes(): array{
    $file="chistes.txt";
    if(!file_exists(filename: $file)){
        return [];
    }
    $content=explode(separator: "\n",string: file_get_contents(filename: $file));
    return $content;
}
function chisteRandom(): string{
   $content=chistes();
   $index=array_rand(array: $content);
   return $content[$index];
}
function addChiste(String $chiste): bool{
$content=chistes();
if(array_search($chiste,$content)===false){
    $content[]=$chiste;
    $file=fopen("chistex.txt","w");
    foreach ($content as $key => $value) {
       fwrite($file,"$chiste\n");
    }
    fclose($file);
    return true;
}
return false;
}
echo chisteRandom();
?>