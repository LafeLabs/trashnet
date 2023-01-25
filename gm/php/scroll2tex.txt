<!-- 
take each scroll, add .tex to end and copy it up a level

-->
<a href = "editor.php">editor.php</a>
<p></p>
<a href = "index.html">index.html</a>

<br/>
<?php

    $scrollfiles = scandir(getcwd()."/scrolls");

    foreach($scrollfiles as $value){
        copy("scrolls/".$value,$value.".tex");
    }


?>

