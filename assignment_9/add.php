<?php
require_once '/home/h/h/hheck/public_html/CPS276/assignment_9/classes/date_note.php';
$dateNote = new date_note();
$msg = $dateNote->newDateNote();
?>
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

      <?php echo $msg; ?>

      <p><a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_9/display.php'>Display Notes</a></p>

      <form method="post" action="add.php">
        <div class="form-group">
            <label for="dateTime">Date and Time</label>
            <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
        </div>
        <div class="form-group">
            <label for="note">File Content</label>
            <textarea name="note" id="filecontent" name="note" class="form-control" cols="30" rows="20"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="addSubmit">Submit</button>
      </form>
    </div>

  </body>
</html>