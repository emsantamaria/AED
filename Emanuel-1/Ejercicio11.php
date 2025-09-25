<?php

use Vtiful\Kernel\Format;
function escribirDiario(String $nota){
    $fecha=date_create();
    $content=explode("\n",file_get_contents("diario.txt"));
    $listContent=[];
    foreach ($content as $key => $value) {
        $value=str_replace("[","",$value);
        $list=explode("]",$value);
        $listContent[]=$list; 
    }
    $date=date_create();
    $date=date_format($date,'Y-m-d H:i');
    $listContent[]=["$date"," $nota"];
    $file=fopen("diario.txt","w+r");
    foreach ($listContent as $key => $value) {
        foreach ($value as $llave => $valor) {
            echo $valor;
            echo count($listContent);
           if(str_contains($valor,"-")){
            $valor="[$valor]";
           }
           fwrite($file,$valor);
        }
        fwrite($file,"\n");
    }
    
}
escribirDiario("Odio estoaa");
?>