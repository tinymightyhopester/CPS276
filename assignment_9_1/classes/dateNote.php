<?php
require_once '/home/h/h/hheck/public_html/CPS276/assignment_9_1/classes/Pdo_methods.php';

class dateNote {

    public function newDateNote(){

        if(isset($_POST["addSubmit"])) {
            if ($_POST["dateTime"] !== "" && $_POST["note"] !== ""){

                $pdo = new Pdo_methods();
                $file_date = strtotime($_POST["dateTime"]);
                $file_note = $_POST["note"];
                echo $file_date;
                echo $file_note;
                

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