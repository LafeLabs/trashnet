<?php

    $files = scandir(getcwd());
    $dirs = [];
    foreach($files as $value){
        if($value[0] != "." && is_dir($value) && $value != "php" && $value != "data"){
            array_push($dirs,$value);
        }
    }
    echo json_encode($dirs);

?>

