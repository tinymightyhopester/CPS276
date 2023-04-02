<?php

require_once "/home/h/h/hheck/public_html/CPS276/classes/Pdo_methods.php";

class CRUD{


    public function insertRecord($addName){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO names(name)VALUES(:addName)";

        $bindings = [
            [':name',$addName,'str']
        ];

        $records = $pdo->otherBinded($sql,$bindings);

    }
}

?>