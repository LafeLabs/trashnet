<?php

$dnaurl = "https://raw.githubusercontent.com/LafeLabs/trashnet/main/data/dna.txt";

if(isset($_GET["dna"])){
    $dnaurl = $_GET["dna"];
}


$baseurl = explode("data/",$dnaurl)[0];
$dnaraw = file_get_contents($dnaurl);
$dna = json_decode($dnaraw);

mkdir("data");
mkdir("php");
//mkdir("jscode");
//mkdir("css");




copy("https://raw.githubusercontent.com/LafeLabs/trashnet/main/php/replicator.txt","replicator.php");

foreach($dna->html as $value){
    
    copy($baseurl.$value,$value);

}


foreach($dna->data as $value){
    
    copy($baseurl."data/".$value,"data/".$value);
    
}


foreach($dna->php as $value){
 
    copy($baseurl."php/".$value,"php/".$value);
    copy($baseurl."php/".$value,explode(".",$value)[0].".php");

}

/*
foreach($dna->css as $value){
 
    copy($baseurl."css/".$value,"css/".$value);

}


    
foreach($dna->javascript as $value){
    copy($baseurl."jscode/".$value,"jscode/".$value);
}
*/


?>
<a href = "index.html">CLICK TO GO TO PAGE</a>
<style>
body{
    background-color:#9f8767;
}
    a{
        font-size:3em;
        font-family:Comic Sans MS;
        color:blue;
    }
</style>
