
<?php
require_once "classes/CRUD.php";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);

if(isset($_POST["submit"])) {
    
    if(!is_dir("uploads/")){
        mkdir("uploads/");
    }

    if ($_FILES["fileToUpload"]["size"] > 100000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($mime != "application/pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $crud = new CRUD();
            $crud->insertRecord($_POST["fileName"],$target_file);
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            echo "<p><a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_7/Uploader.php'>Back to upload page</a></p>";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
}
  ?>
