<?php
?>
<!DOCTYPE html>
<html lang="en">
<form action="/testpage.php" method="post">
  <h1>Add Names</h1>
  
  <button type="submit" class="btn btn-primary" >Add Name</button>
  <button type="submit" class="btn btn-secondary">Clear</button>
  <div class="mb-3">
    <label for="inputName" class="form-label">Enter Name</label>
    <div><input type="Name" class="form-control" id="inputName" aria-describedby="input name"></div>
  </div>
  <div>
  <textarea style="height: 500px;" class="form-control" id="namelist" name="namelist"><?php  ?></textarea>
  </div>
</form>
