<?php
class Names{

    $names;

    public function addNameList(){
        return $names;
    }

    public function addName($name){
        $delim = ' ';
        $namebreak = explode($delim, $name);
        $newname = $namebreak[1].", ".$namebreak[0]."\n";
        $names.=$newname;
    }

    public function clearNames($nameList){
        $nameList = "";
    }
}
?>