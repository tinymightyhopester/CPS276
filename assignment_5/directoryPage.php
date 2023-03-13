<?php
require_once 'Directories.php';
$dct = new Directories();
$msg = "";

if(isset($_POST['create'])){

  if(is_dir($_POST['inputName'])){
    $msg = "Directory already exists";
  }
  else{
    $success = $dct->newDirectory($_POST['inputName'],$_POST['text']);
    if($success){
      $msg = "Directory created";
    }
    else{
      $msg = "There was an error";
    }
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Make A Directory</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
  </head>
  <body>
    <div id="wrapper" class="container">
      <h1>Make A Directory</h1>
      <p><?php echo $msg; ?></p>
      <form action="directoryPage.php" method="POST">
        <label for="inputName" class="form-label">Enter Directory Name:</label>
        <div><input type="Name" class="form-control" id="inputName" aria-describedby="input name"></div>
            <div>
            <label for="text" class="form-label">Enter Text:</label>
            <textarea style="height: 500px;" class="form-control" id="text" name="text">
            <?php  ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="create" value="Create Directory">
        </form>
    </div>
  </body>
</html>