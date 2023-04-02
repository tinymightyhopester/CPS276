<?php
class CRUD{
require_once 'classes/Pdo_methods.php';

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