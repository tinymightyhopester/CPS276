<?php

$msg = "";

//ISSET CHECKS TO SEE IF A VARIBLE EXISTS. RETURNS TRUE IF IT DOES AND FALSE IF IT DOES NOT. 
if(isset($_POST['create'])){
  
   
  $success = mkdir('directories/mydirectory');
  
/* I NEED TO USE THE CHMOD HERE TO SET THE PROPER PERMISSIONS.*/
  chmod('mydirectory', 0777);
 
  if($success){
    $msg = "Directory Created";
  }
  else{
    $msg = "There was a problem";
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
        <label for="inputName" class="form-label">Enter Name</label>
        <div><input type="Name" class="form-control" id="inputName" aria-describedby="input name"></div>
        <input type="submit" class="btn btn-primary" name="create" value="Create Directory">
    
        <div>
            <textarea style="height: 500px;" class="form-control" id="text" name="text">
            <?php  ?></textarea>
        </div>
        </form>
    </div>
  </body>
</html>