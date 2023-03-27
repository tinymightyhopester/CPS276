
<!DOCTYPE html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<html>
<body style="padding: 30px;">

<form action="Uploader.php" method="post" enctype="multipart/form-data">
    <h1>File upload</h1>
    <a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_7/listForm.php'>List of files</a><br></br>
  File name:
  <input type="text" name="fileName" id="fileName"><br></br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br></br>
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
