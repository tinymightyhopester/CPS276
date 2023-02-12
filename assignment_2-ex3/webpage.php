<?php
   $i = 0;
   $j = 0;

   $table = "<table border = '1'>";

   while($i < 5){
      $table .= "<tr>";
      $j = 0;
      
      while($j < 3){
         $table .= "<td>cell $i </td>";
         $j++;
      }
      $i++;
      $table .= "</tr>";

   }

   $table .= "</table>"
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<p><?php echo $table; ?></p>
</body>
</html>