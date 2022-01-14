<?php
    echo "<pre>";

    $dadosJson = file_get_contents('concomitante/ceará.json');

    $dadosJsonDecodificados = json_decode($dadosJson);
 
    foreach($dadosJsonDecodificados as $key => $value){
        echo $value->id;
        echo $value->instituição;
    }
?>