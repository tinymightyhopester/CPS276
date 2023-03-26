<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>File and Directory</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container">
      <h1>Instructions</h1>
      <p>User will enter a directory name and some textual content for a file.  When user clicks "Submit" a directory will be created inside of the "directories" directory, with the name the user entered.  A file named "readme.txt" will be inserted into the directory that was just created.  The text of that file will be whatever the user wrote.</p>
      <p>NOTE: For this project you will need to first create the "directories" directory.</p>
      <p>NOTE: Make sure to have 777 permissions on the "directories" directory</p>

      <p>You will echo out an acknowledgment here, on whether it was successful or not.</p>

      <form method="post" action="directory_file_solution.php">
        <div class="form-group">
          <label for="foldername">Folder Name</label>
          <input type="text" class="form-control" id="directoryname" name="directoryname">
        </div>
        <div class="form-group">
          <label for="filecontent">File Content</label>
          <textarea name="filecontent" id="filecontent" name="filecontent" class="form-control" cols="30" rows="20"></textarea>
          
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>

  </body>
</html>