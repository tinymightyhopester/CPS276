<?php
   $rows = 15;
   $cells = 5;
   $i = 0;
   $j = 0;
   

   $table = "<table border = '1'>";

   while($i < $rows){
      $table .= "<tr>";
      $j = 0;
      
      while($j < $cells){
         $j++;
         $i++;
         $table .= "<td>row $i cell $j</td>";
         $i--;
         
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