<?php
/**
 * metodo que lee los tweets de un archivo txt devolviendo un array con estos
 * @return array<bool|DateTime|string>[]
 */
function tweets(){
    $file = "tweets.txt";
    if (!file_exists($file)) {
        return [];
    }
    $content = file_get_contents($file);
    $lines = explode("\n", $content);
    $listContent = [];
    foreach ($lines as $line) {
        $parts = explode("] ", $line);
        if (count($parts) == 2) {
            $dateStr = str_replace("[", "", $parts[0]);
            $tweetText = $parts[1];
            $date = date_create($dateStr);
            $listContent[] = [$date, $tweetText];
        }
    }
    return $listContent;
}
/**
 * Metodo que permite aniadir un tweet a los tweets almacenados en el archivo txt
 * 
 * @param string $tweet
 * @return void
 */
function addTweet(String $tweet){
    $file = "tweets.txt";
    $file = fopen($file, "a");
    if ($file === false) {
        die("No se pudo abrir el archivo");
    }
    $dateStr = date('Y-m-d H:i');
    fwrite($file, "[{$dateStr}] {$tweet}\n");
    fclose($file);
}
/**
 * metodo que permite buscar los ultimos tweets
 * @param int $numeroHasta numero de los ultimos tweets
 * @return array<array<bool|DateTime|string>>
 */
function ultimas(int $numeroHasta){
    $content=tweets();
    $ultimos=[];
    if(count($content)<$numeroHasta){
        $numeroHasta=count($content);
    }
    array_multisort($content,SORT_DESC);
    for ($i=0; $i <$numeroHasta ; $i++) { 
        $ultimos[]=$content[$i];
    }
    return $ultimos;
}


print_r(ultimas(1));
?>