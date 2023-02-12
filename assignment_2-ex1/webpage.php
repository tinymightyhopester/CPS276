<?php

$string = "";


for ($i = 1; $i < 5; $i++){
	$string .= $i . "<br>";
	for ($j = 1; $j < 4; $j++){
		$string .= "&nbsp;&nbsp;&nbsp;&nbsp;".$j."<br>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<p><?php echo $string; ?></p>
</body>
</html>