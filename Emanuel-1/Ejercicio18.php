<?php
/**
 * metodo que lee todos las comidas dentro de un archivo .txt
 * @return string[]
 */
function comidas(){
    $file = "comidas.txt";
    $content = file_get_contents($file);
    $lines = explode("\n", $content);
    $lines = array_filter($lines, function($line) {
        return trim($line) !== "";
    });
    return array_values($lines); // reindexar
}
/**
 * 
 * Metodo que permite aniadir una comida a un lista de estas y almacenarlas en un archivo .txt
 * @param string $comida
 * @return void
 */
function addComida(String $comida){
    $content=comidas();
    $content[]=$comida;
    $file=fopen("comidas.txt","w");
    foreach ($content as $key => $value) {
        fwrite($file,"$value\n");
    }
    fclose($file);
}
/**
 * Metodo que devuelve la lista de comidas con formato de ranking,
 * mostrando cuantas veces esta, su nombre, y su ranking
 * @return array
 */
function getRanking(){
    $comidas=comidas();
    $numeroVeces=[];
    for ($i=0; $i < count($comidas); $i++) { 
        $comida=$comidas[$i];
        $cantidad=1;
        for ($j=$i+1; $j < count($comidas)-1; $j++) { 
           if($comida===$comidas[$j]){
            $cantidad++;
           }
        }
        $numeroVeces[]=$cantidad;
    }
    $list=eliminarRepetidos($comidas,$numeroVeces);
    $comidas=$list[0];
    $numeroVeces=$list[1];
    $listFinal=[];
    for ($i=0; $i < count($comidas); $i++) { 
        $listFinal[]=[$numeroVeces[$i],$comidas[$i],""];
    }
    array_multisort($listFinal,SORT_DESC);
    for ($i=0; $i <count($listFinal) ; $i++) { 
       $ranking=$i+1;
       $listFinal[$i][2]="$ranking";
    }
    return $listFinal;
}
/**
 * Metodo que permite eliminar las comidas repetidas en un array
 * @param array $array1 array de comidas
 * @param array $array2 array con el numero de veces q esta cada comida
 * @return array<array>
 */
function eliminarRepetidos(array $array1,array $array2){
    $copia1=[];
    $copia2=[];
    for ($i=0; $i <count($array1) ; $i++) { 
        if(array_search($array1[$i],$copia1)===false){
            $copia1[]=$array1[$i];
            $copia2[]=$array2[$i];
        }
    }
    return [$copia1,$copia2];
}

print_r(getRanking());
?>