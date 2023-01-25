<?php

$dnaurl = "https://raw.githubusercontent.com/LafeLabs/pibrary/main/chaos/data/dna.txt";

if(isset($_GET["dna"])){
    $dnaurl = $_GET["dna"];
}


$baseurl = explode("data/",$dnaurl)[0];
$dnaraw = file_get_contents($dnaurl);
$dna = json_decode($dnaraw);

mkdir("data");
mkdir("php");
mkdir("maps");
mkdir("scrolls");
mkdir("jscode");
mkdir("iconsymbols");
mkdir("uploadimages");


copy("https://raw.githubusercontent.com/LafeLabs/pibrary/main/chaos/php/replicator.txt","replicator.php");

foreach($dna->html as $value){
    
    copy($baseurl.$value,$value);

}

foreach($dna->javascript as $value){
    
    copy($baseurl."jscode/".$value,"jscode/".$value);

    
}

foreach($dna->iconsymbols as $value){
    
    copy($baseurl."iconsymbols/".$value,"iconsymbols/".$value);

}

foreach($dna->data as $value){
    
    copy($baseurl."data/".$value,"data/".$value);
    
}

foreach($dna->php as $value){
 
    copy($baseurl."php/".$value,"php/".$value);
    copy($baseurl."php/".$value,explode(".",$value)[0].".php");

}

foreach($dna->maps as $value){
    
    if($value == "home"){
        copy($baseurl."maps/".$value,"maps/".$value);
    }
    
}

foreach($dna->scrolls as $value){
    if($value == "home"){
        copy($baseurl."scrolls/".$value,"scrolls/".$value);
    }
}


?>
<a href = "index.html">CLICK TO GO TO PAGE</a>
<style>
a{
    font-size:3em;
}
</style>
