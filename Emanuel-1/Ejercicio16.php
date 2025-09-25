<?php
function palabras(): array{
    $file="palabras.txt";
    if(!file_exists($file)){
        return [];
    }
    $content=explode("\n",file_get_contents($file));
    return $content;
}
function palabraRan(){
    $content=palabras();
    $index=array_rand($content);
    return $content[$index];
}
function palabraIncompleta(){
    $palabra=palabraRan();
    $letras=str_split($palabra);
    $index1=array_rand($letras);
    $index2=array_rand($letras);
    while ($index2 === $index1) {
       $index2=array_rand($letras);
    }
    $palabraOculta="";
    for ($i=0; $i <count($letras) ; $i++) { 
        if($i!=$index1&&$i!=$index2){
            $letras[$i]="_";
        }
        $palabraOculta.=$letras[$i];
    }
    return [$palabraOculta,$palabra];
    
}
$list=palabraIncompleta();
echo $list[0];
echo "\n";
$intento="";
while ($list[1] != $intento) {
    echo "Intente adivinar:\n";
    $intento=readline();
    if($intento===$list[1]){
        echo "Felicidades\n";
    }
    else {
        echo "Muy mal\n";
    }
}
?>
