<?php

$string = "<ul>";

for ($i = 1; $i < 5; $i++){
	$string .= "<li>".$i."</li>";
	$string .= "<ul>";
	for ($j = 1; $j < 4; $j++){
		$string .= "&nbsp;&nbsp;&nbsp;&nbsp; <li>".$j."</li>";
	}
	$string .= "</ul>";
}

$string .= "</ul>";

?>
<!DOCTYPE html>
<html lang="en">
<body>
	<p><?php echo $string; ?></p>
</body>
</html>