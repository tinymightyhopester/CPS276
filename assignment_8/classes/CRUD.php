<?php

require_once "/home/h/h/hheck/public_html/CPS276/assignment_8/classes/Pdo_methods.php";

class CRUD{


    public function insertRecord($name){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO names(name)VALUES(:name)";

        $bindings = [
            [':name',$name,'str']
        ];

        $records = $pdo->otherBinded($sql,$bindings);

        return $records;

    }
}

?>