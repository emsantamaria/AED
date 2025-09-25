<?php
$file="datos.txt";
$datos=file_get_contents($file);
echo str_word_count($datos);
?>