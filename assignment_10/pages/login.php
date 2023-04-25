<?php
$error = '';

if(isset($_POST['submit'])){
  /* IF THE USERNAME AND PASSWORD MATCH THEN REDIRECT TO */
  if($_POST['email'] === "admin" && $_POST['password'] === "password"){
    
    session_start();
    $_SESSION['access'] = "accessGranted";

    /* HERE I STORE A FIRST NAME IN THE SESSION AS WELL AND WILL DISPLAY IT ON EVERY PAGE*/
    $_SESSION['name'] = $_POST['name'];

    //session_regenerate_id();
    header('location:welcome.php');
  }
  else {
    $error = "Incorrect username or password";
  }
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