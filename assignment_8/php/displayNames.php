<?php

    require_once "/home/h/h/hheck/public_html/CPS276/assignment_8/classes/CRUD.php";
    $crud = new CRUD();

    $list = $crud->getNames();
    
    $response = (object)[
        'masterstatus'=>'success',
        "names"=>$list
    ];
 
    echo json_encode($response);

    //return $list;
?>