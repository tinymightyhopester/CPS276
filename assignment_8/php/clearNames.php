<?php

require_once "/home/h/h/hheck/public_html/CPS276/assignment_8/classes/CRUD.php";
$crud = new CRUD();

$records = $crud->clearNames;

$response = (object)[
    'masterstatus'=>'success',
    "msg"=>"All names deleted"
];

?>