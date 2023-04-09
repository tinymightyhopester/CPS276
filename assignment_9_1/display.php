<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Notes</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container">
      <h1>Display Notes</h1>

      <p><a href='https://russet-v8.wccnet.edu/~hheck/CPS276/assignment_9_1/add.php'>Add Note</a></p>

      <form method="post" action="display.php">
        <div class="form-group">
            <label for="beginningDate">Beginning Date</label>
            <input type="date" class="form-control" id="beginningDate" name="beginningDate">
        </div>
        <div class="form-group">
            <label for="endDate">End Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>
        <button type="submit" class="btn btn-primary" name="displaySubmit">Submit</button>
      </form>
    </div>

  </body>
</html>