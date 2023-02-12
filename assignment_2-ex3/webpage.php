<?php
   $h = 5;
   $i = 0;
   $j = 0;
   $k = 3;

   $table = "<table border = '1'>";

   while($i < $h){
      $table .= "<tr>";
      $j = 0;
      
      while($j < $k){
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