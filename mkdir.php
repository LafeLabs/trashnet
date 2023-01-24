<?php
//mkdir.php?dir=[dirname]

$dirname = $_GET["dir"];//get dir
mkdir($dirname);

if(isset($_GET["replicator"])){

    $replicatorurl = $_GET["replicator"];
    copy($replicatorurl,$dirname."/replicator.php");
    
}
else{
    copy("php/replicator.txt",$dirname."/replicator.php");    
}



echo "<a href = \"".$dirname."/replicator.php\">CLICK THIS LINK TO REPLICATE THE TRASH NET BOARD</a>";

?>
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