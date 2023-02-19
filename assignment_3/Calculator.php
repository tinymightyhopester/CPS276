<?php
class Calculator{
    
    public function calc($operator, $num1, $num2){
        
        if (is_null($operator) or is_null($num1) or is_null($num1)){
            return "Must enter a string and two numbers";
        }
        else if (is_string($operator) && is_int($num1) && is_int($num1))
        {
            if ($num2 == 0){
                return "Cannot divide by zero";
            }
            else{
                if($operator == "/"){

                    $x = $num1/$num2;
                    return "The division of the numbers is ".$x."\n";

                }else if($operator == "*"){

                    $x = $num1*$num2;
                    return "The product of the numbers is ".$x;

                }else if($operator == "-"){

                    $x = $num1-$num2;
                    return "The difference of the numbers is ".$x;

                }else if($operator == "+"){

                    $x = $num1+$num2;
                    return "The sum of the numbers is ".$x;

                }else{
                    return "invalid operator";
                }
            }
        }
    }

}
?>