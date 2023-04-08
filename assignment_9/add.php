<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Note</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container">
      <h1>Add Note</h1>

      <p><a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_9/display.php'>Display Notes</a></p>

      <form method="post" action="">
        <div class="form-group">
            <label for="dateTime">Date and Time</label>
            <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
        </div>
        <div class="form-group">
            <label for="note">File Content</label>
            <textarea name="note" id="filecontent" name="note" class="form-control" cols="30" rows="20"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>

  </body>
</html>