<?php

    $data = json_decode($_POST['data']);



    $response = (object)[
        'masterstatus'=>'success',
        'msg'=>"Name added"
    ];
    
    echo json_encode($response);

?>