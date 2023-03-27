<?php
require_once "classes/CRUD.php";
$crud = new CRUD();
?>
<!DOCTYPE html>
<html>
<body>

<form action="Uploader.php" method="post" enctype="multipart/form-data">
    <h1>File List</h1>
    
  Files:<br></br>
  <div id="fileList"><?php echo $crud->getLocations('list'); ?></div>

  <a target='_blank' href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_7/uploadForm.php'>Back to upload page</a><br></br>

</form>

</body>
</html>