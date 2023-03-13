<?php
//$path = "<p><a href = 'path to file'>Path to file</a></p>"

class Directories{

    public function newDirectory($name, $text){
        mkdir('directories/'.$name);
        chmod($name, 0777);
        $read = fopen("readme.txt","a");
        fwrite($read, $text);
        fclose($read);
    }

}
?>