<?php 

class AddNamesProc {

	private $output;

	public function addClearNames(){
		if(isset($_POST['addName'])){
			return $output = $this->addName();
		}
		else if(isset($_POST['clearNames'])){
			return $output = "";
		}
	}

	private function addName(){
		$namesArr = [];
		
		$tempArr = explode(" ",$_POST['name']);

		$name = "{$tempArr[1]}, {$tempArr[0]}";

		if($_POST['namelist'] !== ""){
			$namesArr = explode("\n",$_POST['namelist']);
		}

		array_push($namesArr, $name);

		sort($namesArr);

		return implode($namesArr, "\n");
	}
}
?>