<?php

require_once "/home/h/h/hheck/public_html/CPS276/assignment_8/classes/CRUD.php";
$crud = new CRUD();

    $data = json_decode($_POST['data']);

    $name = explode(" ", $data->name);
    $fname = $name[0];
    $lname = $name[1];
    $addName = "$lname, $fname\n";

    $records = $crud->insertRecord($addName);

    if($records == 'error'){
        $response = (object)[
            'msg'=>"Name added"
        ];
    }else{
        $response = (object)[
            'msg'=>"Name added"
        ];
    }

?>