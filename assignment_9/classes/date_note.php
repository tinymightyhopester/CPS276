<?php
require_once 'classes/CRUD.php';
$crud = new CRUD();

class date_note {

    public function newDateNote($date,$note){
        $timestamp = strtotime($date);
        $crud -> insertRecord($timestamp,$note);
    }

}
?>