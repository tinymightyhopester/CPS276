<?php
require_once '/home/h/h/hheck/public_html/CPS276/assignment_9/classes/Pdo_methods.php';

class date_note {

    public function newDateNote(){

        if(isset($_POST["addSubmit"])) {
            if ($_POST["dateTime"] !== "" && $_POST["note"] !== ""){
                $timestamp = strtotime($_POST["dateTime"]);
                insertRecord($timestamp,$_POST["note"]);
                return "<p>sucessfully added note<p>";
            }else{
                return "<p>must enter date, time, and note<p>";
            }
        }
        
        
    }

    public function getDateNotes($beginningDate, $endDate){

        $pdo = new Pdo_methods();
        
        $sql = "SELECT file_date, file_note FROM date_notes WHERE file_date BETWEEN :beginningDate AND :endDate ORDER BY file_date DESC";

        $bindings = [
			[':beginningDate',$beginningDate,'timestamp'],
			[':endDate',$endDate,'timestamp'],
		];

        $records = $pdo->selectBinded($sql, $bindings);

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

    public function insertRecord($file_date, $file_note){
        $pdo = new Pdo_methods();
        
        $sql = "INSERT INTO date_notes(file_date,file_note)VALUES(:file_date,:file_note)";

        $bindings = [
			[':file_date',$file_date,'timestamp'],
			[':file_note',$file_note,'str'],
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