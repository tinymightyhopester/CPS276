<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case "name": return $this->name($value); break;
			case "phone": return $this->phone($value); break;
            case "email": return $this->email($value); break;
			case "address": return $this->address($value); break;
			case "dob": return $this->dob($value); break;
			case "city": return $this->city($value); break;
			case "password": return $this->password($value); break;
		}
	}


		
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function name($value){
		//$match = preg_match("/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $value);
		$match = preg_match("/^[a-zA-Z.'\- ]+$/", $value);
		return $this->setError($match);
	}

	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}

    private function email($value){
		$match = preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $value);
		return $this->setError($match);
	}

	private function address($value){
		$match = preg_match('/\d+\s[a-zA-Z0-9]+/', $value);
		return $this->setError($match);
	}

	private function dob($value){
		$match = preg_match('/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/', $value);
		return $this->setError($match);
	}

	private function city($value){
		$match = preg_match('/^[A-Za-z]+$/', $value);
		return $this->setError($match);
	}
	
	private function password($value){
		$match = preg_match('/^(?=.*[a-zA-Z\d].*)[a-zA-Z\d!@#$%&*]{7,}$/', $value);
		return $this->setError($match);
	}
	
	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}
?>