<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init(){
    global $elementsArr, $stickyForm;

    if(isset($_POST['submit'])){

        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if($postArr['masterStatus']['status'] == "noerrors"){
      
        //return checkUser($_POST);

            if($_POST['email'] === "hheck@admin.com" && $_POST['password'] === "password"){
            
                session_start();
                $_SESSION['access'] = "accessGranted";

                /* HERE I STORE A FIRST NAME IN THE SESSION AS WELL AND WILL DISPLAY IT ON EVERY PAGE*/
                //$_SESSION['name'] = $_POST['name'];

                //session_regenerate_id();
                header('location:welcome.php');
            }
        }
        else {
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
        "value"=>"test",
        "regex"=>"name"
    ]
];

function getForm($acknowledgement, $elementsArr){
    //global $stickyForm;
    
    /* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
    $form = <<<HTML
        <form method="post" action="index.php?page=welcome">
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