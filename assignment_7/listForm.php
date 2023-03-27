<?php
require_once "classes/CRUD.php";
$crud = new CRUD();
?>
<!DOCTYPE html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<html>
<body>

<form action="Uploader.php" method="post" enctype="multipart/form-data">
    <h1>File List</h1>
    
  Files:<br></br>
  <div id="fileList"><?php echo $crud->getLocations('list'); ?></div>

  <a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_7/uploadForm.php'>Back to upload page</a><br></br>

</form>

</body>
</html>