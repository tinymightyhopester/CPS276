<?php
require_once '/home/h/h/hheck/public_html/CPS276/assignment_9_1/classes/Pdo_methods.php';

class dateNote {

    public function newDateNote(){

        if(isset($_POST["addSubmit"])) {
            if ($_POST["dateTime"] !== "" && $_POST["note"] !== ""){

                $pdo = new Pdo_methods();
                $file_date = strtotime($_POST["dateTime"]);
                $file_note = $_POST["note"];                

                $sql = "INSERT INTO date_notes(file_date,file_note)VALUES(:file_date,:file_note)";

                $bindings = [
                    [':file_date',$file_date,'int'],
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

    public function getDateNotes(){
        if(isset($_POST["displaySubmit"])) {
            if ($_POST["beginningDate"] !== "" && $_POST["endDate"] !== ""){

                $pdo = new Pdo_methods();
                $beginningDate = strtotime($_POST["beginningDate"]);
                $endDate = strtotime($_POST["endDate"]);

                $sql = "SELECT file_date, file_note FROM date_notes WHERE file_date BETWEEN :beginningDate AND :endDate ORDER BY file_date DESC";

                $bindings = [
                    [':beginningDate',$beginningDate,'int'],
                    [':endDate',$endDate,'int'],
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
            }else{
                return "<p>must enter dates</p>";
            }
        }
    }

    private function makeList($records){
        $table = "<table border = '1'><tr><td>Date and time:</td><td>Note:</td></tr>";
        
        foreach ($records as $row){
            $dt = date('m/d/Y H:i:s',$row['file_date']);
            $table .= "<tr><td><p>{$dt}</td><td>{$row['file_note']}</p></td></tr>";
        }
        $table .= '</tr></table>';
		return $table;
    }

}
?>