<?php

require_once('classes/StickyForm.php');
require_once('classes/Pdo_methods.php');
$stickyForm = new StickyForm();

function init(){
    global $elementsArr, $stickyForm;

    if(isset($_POST['submit'])){

        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if($postArr['masterStatus']['status'] == "noerrors"){
      
            $pdo = new Pdo_methods();
            $sql = "SELECT * FROM admins WHERE email=:email";

            $bindings = [
                [':email', $_POST['email'], 'str'],
            ];
            $record = $pdo->selectBinded($sql, $bindings);

            if(count($record) != 0){

                if(password_verify($_POST['password'], $record[0]['password'])){
	                session_start();
	                $_SESSION['access'] = "accessGranted";

                    if($record[0]['status']==="admin"){
                        $_SESSION['status'] = 'admin';
                        header('location:index.php?page=welcome');
                    }
                    if($record[0]['status']==="staff"){
                        $_SESSION['status'] = 'staff';
                        header('location:index.php?page=welcome');
                    }
                }else{
                    return getForm("", $elementsArr);
                }
            }else{
                return getForm("", $elementsArr);
            }
        }else {
            return getForm("", $elementsArr);
        }
    }else {
        return getForm("", $elementsArr);
    }
}

$elementsArr = [
    "masterStatus"=>[
        "status"=>"noerrors",
        "type"=>"masterStatus"
    ],
    "email"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be a standard email</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"hheck@admin.com",
        "regex"=>"email"
    ],
    "password"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be a valid password</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"password",
        "regex"=>"name"
    ]
];

function getForm($acknowledgement, $elementsArr){
    //global $stickyForm;
    
    /* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
    $form = <<<HTML
        <form method="post" action="index.php?page=login">
        <div class="form-group">
          <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
          <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
        </div>
        <div class="form-group">
          <label for="password">Password{$elementsArr['password']['errorOutput']}</label>
          <input type="text" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
        </div>
        <div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    HTML;
    
    /* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
    return [$acknowledgement, $form];
    
}
?>