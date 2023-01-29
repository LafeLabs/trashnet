    <?php
    
    $pibraryurl = "https://raw.githubusercontent.com/LafeLabs/pibrary/main/data/pibrary.txt";
    
    if(isset($_GET["pibrary"])){
        $pibraryurl = $_GET["pibrary"];
    }
    

    $baseurl = explode("data/",$pibraryurl)[0];
    $pibraryraw = file_get_contents($pibraryurl);
    $pibrary = json_decode($pibraryraw);    
    
    
    foreach($pibrary->forks as $value){
        mkdir($value);
        copy("php/replicator.txt",$value."/replicator.php");
        mkdir($value."/data");
        copy($baseurl.$value."/data/scrollset.txt",$value."/data/scrollset.txt");
    }
    

    ?>
    <a href = "index.html">CLICK TO GO TO HOME</a>
    <style>
    a{
        font-size:3em;
    }
    </style>
