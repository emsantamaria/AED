<?php
    $content=file_get_contents("datos.json");
    $content=json_decode($content);
    foreach ($content as $key => $value) {
      foreach ($value as $key2 => $value2) {
        echo "$value2 \n";
      }
    }
?>