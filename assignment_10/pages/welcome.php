<?php

function init(){
    $name = $_SESSION['name'];
    $status = $_SESSION['status'];
    return ["<h1>Welcome $name</h1>","<p>Welcome to the $status homepage. Please click one of the lines above.</p>"];
}

?>