<?php

/* HERE I REQUIRE AND USE THE STICKYFORM CLASS THAT DOES ALL THE VALIDATION AND CREATES THE STICKY FORM.  THE STICKY FORM CLASS USES THE VALIDATION CLASS TO DO THE VALIDATION WORK.*/
require_once('/home/h/h/hheck/public_html/CPS276/assignment_10/classes/StickyForm.php');
$stickyForm = new StickyForm();

/*THE INIT FUNCTION IS WRITTEN TO START EVERYTHING OFF IT IS CALLED FROM THE INDEX.PHP PAGE */
function init(){
  global $elementsArr, $stickyForm;

  /* IF THE FORM WAS SUBMITTED DO THE FOLLOWING  */
  if(isset($_POST['submit'])){

    /*THIS METHODS TAKE THE POST ARRAY AND THE ELEMENTS ARRAY (SEE BELOW) AND PASSES THEM TO THE VALIDATION FORM METHOD OF THE STICKY FORM CLASS.  IT UPDATES THE ELEMENTS ARRAY AND RETURNS IT, THIS IS STORED IN THE $postArr VARIABLE */
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

    /* THE ELEMENTS ARRAY HAS A MASTER STATUS AREA. IF THERE ARE ANY ERRORS FOUND THE STATUS IS CHANGED TO "ERRORS" FROM THE DEFAULT OF "NOERRORS".  DEPENDING ON WHAT IS RETURNED DEPENDS ON WHAT HAPPENS NEXT.  IN THIS CASE THE RETURN MESSAGE HAS "NO ERRORS" SO WE HAVE NO PROBLEMS WITH OUR VALIDATION AND WE CAN SUBMIT THE FORM */
    if($postArr['masterStatus']['status'] == "noerrors"){
      
      /*addData() IS THE METHOD TO CALL TO ADD THE FORM INFORMATION TO THE DATABASE (NOT WRITTEN IN THIS EXAMPLE) THEN WE CALL THE GETFORM METHOD WHICH RETURNS AND ACKNOWLEDGEMENT AND THE ORGINAL ARRAY (NOT MODIFIED). THE ACKNOWLEDGEMENT IS THE FIRST PARAMETER THE ELEMENTS ARRAY IS THE ELEMENTS ARRAY WE CREATE (AGAIN SEE BELOW) */
      return addData($_POST);

    }
    else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      return getForm("",$postArr);
    }
    
  }

  /* THIS CREATES THE FORM BASED ON THE ORIGINAL ARRAY THIS IS CALLED WHEN THE PAGE FIRST LOADS BEFORE A FORM HAS BEEN SUBMITTED */
  else {
      return getForm("", $elementsArr);
    } 
}

/* THIS IS THE DATA OF THE FORM.  IT IS A MULTI-DIMENTIONAL ASSOCIATIVE ARRAY THAT IS USED TO CONTAIN FORM DATA AND ERROR MESSAGES.   EACH SUB ARRAY IS NAMED BASED UPON WHAT FORM FIELD IT IS ATTACHED TO. FOR EXAMPLE, "NAME" GOES TO THE TEXT FIELDS WITH THE NAME ATTRIBUTE THAT HAS THE VALUE OF "NAME". NOTICE THE TYPE IS "TEXT" FOR TEXT FIELD.  DEPENDING ON WHAT HAPPENS THIS ASSOCIATE ARRAY IS UPDATED.*/
$elementsArr = [
    "masterStatus"=>[
        "status"=>"noerrors",
        "type"=>"masterStatus"
    ],
	"name"=>[
	    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"Scott",
		"regex"=>"name"
	],
    "address"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Address cannot be blank and must be standard address</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"123 Somestreet",
        "regex"=>"name"
    ],
    "city"=>[
	    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>City cannot be blank</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"Sometown",
		"regex"=>"name"
	],
    "state"=>[
        "type"=>"select",
        "options"=>["mi"=>"Michigan","oh"=>"Ohio","pa"=>"Pennslyvania","tx"=>"Texas","mo"=>"Missouri"],
        "selected"=>"mi",
        "regex"=>"name"
    ],
	"phone"=>[
		"errorMessage"=>"<span style='color: red; margin-left: 15px;'>Phone cannot be blank and must be a valid phone number</span>",
        "errorOutput"=>"",
        "type"=>"text",
		"value"=>"999.999.9999",
		"regex"=>"phone"
    ],
    "email"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be a standard email</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"somename@example.com",
        "regex"=>"email"
      ],
    "dob"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>DOB cannot be blank and must be a standard DOB</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"08/28/1983",
        "regex"=>"dob"
    ],
    "contacts"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one contact option</span>",
        "errorOutput"=>"",
        "type"=>"checkbox",
        "action"=>"required",
        "status"=>["Newsletter"=>"", "EmailUpdates"=>"", "TextUpdates"=>""]
    ],
    "ageRange"=>[
        "action"=>"notRequired",
        "type"=>"radio",
        "value"=>["10-18"=>"", "19-30"=>"", "30-50"=>"", "51+"=>""]
    ]
];
getForm("", $elementsArr);
/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function addData($post){
  global $elementsArr;  
  /* IF EVERYTHING WORKS ADD THE DATA HERE TO THE DATABASE HERE USING THE $_POST SUPER GLOBAL ARRAY */
      //print_r($_POST);
      require_once('classes/Pdo_methods.php');

      $pdo = new Pdo_methods();

      $sql = "INSERT INTO contacts (name, address, city, state, phone, email, dob, contacts, age) VALUES (:name, :address, :city, :state, :phone, :email, :dob, :contacts, :age)";

      /* THIS TAKE THE ARRAY OF CHECK BOXES AND PUT THE VALUES INTO A STRING SEPERATED BY COMMAS  */
      if(isset($_POST['contacts'])){
        $contacts = "";
        foreach($post['contacts'] as $v){
          $contacts .= $v.",";
        }
        /* REMOVE THE LAST COMMA FROM THE CONTACTS */
        $contacts = substr($contacts, 0, -1);
      }

      if(isset($_POST['ageRange'])){
        $age = $_POST['ageRange'];
      }
      else {
        $age = "";
      }


      $bindings = [
        [':name',$post['name'],'str'],
        [':address',$post['address'],'str'],
        [':city',$post['city'],'str'],
        [':state',$post['state'],'str'],
        [':phone',$post['phone'],'str'],
        [':email',$post['email'],'str'],
        [':dob',$post['dob'],'str'],
        [':contacts',$contacts,'str'],
        [':age',$age,'str']
      ];

      $result = $pdo->otherBinded($sql, $bindings);

      if($result == "error"){
        return getForm("<p>There was a problem processing your form</p>", $elementsArr);
      }
      else {
        return getForm("<p>Contact Information Added</p>", $elementsArr);
      }
      
}
   

/*THIS IS THEGET FROM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){

global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['state']);

/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
    <form method="post" action="index.php?page=addContact">
    <div class="form-group">
        <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
        <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
        <label for="address">Address{$elementsArr['address']['errorOutput']}</label>
        <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
        <label for="city">City{$elementsArr['city']['errorOutput']}</label>
        <input type="text" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <select class="form-control" id="state" name="state">
        $options
        </select>
    </div>
    <div class="form-group">
        <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
    </div>
    <div class="form-group">
        <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
        <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
        <label for="dob">Date of birth{$elementsArr['dob']['errorOutput']}</label>
        <input type="text" class="form-control" id="dob" name="dob" value="{$elementsArr['dob']['value']}" >
    </div>        
    <p>Please check all contact options (you must check at least one):{$elementsArr['contacts']['errorOutput']}</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="contacts[]" id="contacts1" value="Newsletter" {$elementsArr['contacts']['status']['Newsletter']}>
        <label class="form-check-label" for="contacts1">Newsletter</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="contacts[]" id="contacts2" value="EmailUpdates" {$elementsArr['contacts']['status']['EmailUpdates']}>
        <label class="form-check-label" for="contacts2">Email updates</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="contacts[]" id="contacts3" value="TextUpdates" {$elementsArr['contacts']['status']['TextUpdates']}>
        <label class="form-check-label" for="contacts3">Text updates</label>
    </div>
        
    <p>Please select an age range (optional):</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ageRange" id="ageRange1" value="10-18"  {$elementsArr['ageRange']['value']['10-18']}>
        <label class="form-check-label" for="ageRange1">10-18</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ageRange" id="ageRange2" value="19-30"  {$elementsArr['ageRange']['value']['19-30']}>
        <label class="form-check-label" for="ageRange2">19-30</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ageRange" id="ageRange3" value="30-50"  {$elementsArr['ageRange']['value']['30-50']}>
        <label class="form-check-label" for="ageRange3">30-50</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ageRange" id="ageRange4" value="51+"  {$elementsArr['ageRange']['value']['51+']}>
        <label class="form-check-label" for="ageRange4">51+</label>
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