<?php

require_once "/home/h/h/hheck/public_html/CPS276/assignment_8/classes/Pdo_methods.php";

class CRUD{

    public function getNames(){

        $pdo = new Pdo_methods();
        
        $sql = "SELECT * FROM names";

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
            return 'There has been an error processing your request';
        }
        else {
            if(count($records) != 0){
                return $this->makeList($records);	
            }
            else {
                return 'no records found';
            }
        }
    }

    public function insertRecord($name){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO names(name)VALUES(:name)";

        $bindings = [
            [':name',$name,'str']
        ];

        $records = $pdo->otherBinded($sql,$bindings);

        return $records;

    }

    private function makeList($records){
        $list = "";
        foreach ($records as $row){
            $list .= "{$row['name']}<br>";
        }
		return $list;
    }

}

?>