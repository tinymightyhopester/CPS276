<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();
$error = '';

function init(){
    global $elementsArr, $stickyForm;

    if(isset($_POST['submit'])){

        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if($postArr['masterStatus']['status'] == "noerrors"){
      
        return checkUser($_POST);

    /* IF THE USERNAME AND PASSWORD MATCH THEN REDIRECT TO */
        // if($_POST['email'] === "admin" && $_POST['password'] === "password"){
            
        //     session_start();
        //     $_SESSION['access'] = "accessGranted";

        //     /* HERE I STORE A FIRST NAME IN THE SESSION AS WELL AND WILL DISPLAY IT ON EVERY PAGE*/
        //     $_SESSION['name'] = $_POST['name'];

        //     //session_regenerate_id();
        //     header('location:welcome.php');
        // }
        // else {
        //     $error = "Incorrect username or password";
        // }
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
        "value"=>"",
        "regex"=>"password"
    ]
  ];

  function addData($post){
    global $elementsArr;  
    /* IF EVERYTHING WORKS ADD THE DATA HERE TO THE DATABASE HERE USING THE $_POST SUPER GLOBAL ARRAY */
        //print_r($_POST);
        require_once('classes/Pdo_methods.php');
  
        $pdo = new Pdo_methods();
  
        $sql = "";
  
        /* THIS TAKE THE ARRAY OF CHECK BOXES AND PUT THE VALUES INTO A STRING SEPERATED BY COMMAS  */
        if(isset($_POST['financial'])){
          $financial = "";
          foreach($post['financial'] as $v){
            $financial .= $v.",";
          }
          /* REMOVE THE LAST COMMA FROM THE CONTACTS */
          $financial = substr($financial, 0, -1);
        }
  
        if(isset($_POST['eyeColor'])){
          $eyeColor = $_POST['eyeColor'];
        }
        else {
          $eyeColor = "";
        }
  
  
        $bindings = [
          [':name',$post['name'],'str'],
          [':phone',$post['phone'],'str'],
          [':state',$post['state'],'str'],
          [':financial',$financial,'str'],
          [':eye',$eyeColor,'str']
        ];
  
        $result = $pdo->otherBinded($sql, $bindings);
  
        if($result == "error"){
          return getForm("<p>There was a problem processing your form</p>", $elementsArr);
        }
        else {
          return getForm("<p>Contact Information Added</p>", $elementsArr);
        }
        
}

function getForm($acknowledgement, $elementsArr){
    //global $stickyForm;
    
    /* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
    $form = <<<HTML
        <form method="post" action="index.php?page=addContact">
        <div class="form-group">
          <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
          <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
        </div>
        <div class="form-group">
          <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
        </div>
        
        <div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    HTML;
    
    /* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
    return [$acknowledgement, $form];
    
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	<link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
  <div class="container">
    <div id="wrapper">
      <header>
        <br></br>
        <h1>Login</h1>
      </header>
      <main>
        <p class="error"><?php echo $error; ?></p>
        <form action="login.php" method="post">
          <div class="form-group">
            <label>Email: <input type="text" name="email" class="form-control"></label>
            <label>Password: <input type="password" name="password" class="form-control"></label>
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
          </div>
        </form> 
      </main>
    </div>
  </div>
  </body>
</html>