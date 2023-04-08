<?php
require_once 'classes/Pdo_methods.php';
class CRUD{

    public function getLocations(){

        $pdo = new Pdo_methods();
        
        $sql = "SELECT * FROM file_locations";

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
            return 'There has been and error processing your request';
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

    public function insertRecord($fileName, $fileLocation){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO file_locations(file_name,file_path)VALUES(:fileName,:fileLocation)";

        $bindings = [
			[':fileName',$fileName,'str'],
			[':fileLocation',$fileLocation,'str'],
		];

        $records = $pdo->otherBinded($sql,$bindings);

        if($records == 'error'){
            return 'There has been an error processing your request';
        }else{
            return "record added";
        }
    }

    private function makeList($records){
        $list = '<ol>';
        foreach ($records as $row){
            $list .= "<li><p><a target='_blank' href={$row['file_date']}>{$row['file_note']}</a></p></li>";
        }
        $list .= '</ol>';
		return $list;
    }

}
?>