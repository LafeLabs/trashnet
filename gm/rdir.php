<?php


if(isset($_GET["filename"])){
    $filename = $_GET["filename"];//
}
else{

$filename = getcwd();
    
}

echo json_encode(getFiles($filename));

function getFiles(string $directory, array $allFiles = []): array
{
    $files = array_diff(scandir($directory), ['.', '..']);

    foreach ($files as $file) {
        $fullPath = $directory."/".$file;
        
        if( is_dir($fullPath) )
            $allFiles += getFiles($fullPath, $allFiles);
        else
            //$allFiles[] = $directory."/".$file;
            $localdirectory = explode(getcwd(),$directory)[1];
            $allFiles[] = $localdirectory."/".$file;
    }

    return $allFiles;
}

?>

