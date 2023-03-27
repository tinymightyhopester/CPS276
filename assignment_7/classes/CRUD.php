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
                return $this->makeArray($records);	
            }
            else {
                return 'no customers found';
            }
        }
    }

    private function insertRecord($fileName, $fileLocation){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO file_locations(file_name,file_path) VALUES ($fileName,$fileLocation)";

        $records = $pdo->otherNotBinded($sql);
        if($records == 'error'){
            return 'There has been and error processing your request';
        }
    }

    private function makeArray($records){

        //foreach ($records){}

        

    }

}
?>