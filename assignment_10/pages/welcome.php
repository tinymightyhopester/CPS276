<?php

function init(){
    $name = $_SESSION['name'];
    return ["<h1>Welcome $name</h1>","<p>Welcome the stick form mod application. Click one of the lines above</p>"];
}

?>