<?php

require_once 'C:/Users/creat/CPS276/assignment_8/classes/CRUD.php';
$crud = new CRUD();

    $data = json_decode($_POST['data']);

    $name = explode(" ", $data->name);
    $fname = $name[0];
    $lname = $name[1];
    $addName = "$lname, $fname\n";

    $crud->insertRecord($addName);

    $response = (object)[
        'masterstatus'=>'success',
        'msg'=>"Name added"
    ];
    
    echo json_encode($response);

?>