<!-- 
this program generates the file data/dna.txt
dna.txt is a json formatted file which points to all the files in this system, which is then used by replciator.php to copy the whole thing.  The file names are local, so that the replicator can work when pointed at any address where this system lives, which could be any new instance, so that the system can replicate without any reference to some centralized repository such as one on github. 
-->
<a href = "editor.php">editor.php</a>
<p></p>
<a href = "index.html">index.html</a>

<br/>
<pre>
<?php

    $files = scandir(getcwd());

    $forks = [];
    
    foreach($files as $value){
        if(is_dir($value) && $value != "symbolset"&& $value != "mapset" && $value != "mapbook" && $value != "iconset" && $value != "imageset" && $value != "codeset" && $value[0] != "." && $value != "scrolls" && $value != "php" && $value != "data" && $value != "iconsymbols"  && $value != "chaos"){
            array_push($forks,$value);
        }
    }

    $pibrary = json_decode("{}");
    $pibrary->forks = $forks;

//    $pibrary->server = 


    echo json_encode($pibrary,JSON_PRETTY_PRINT);

    $file = fopen("data/pibrary.txt","w");// create new file with this name
    fwrite($file,json_encode($pibrary,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>

