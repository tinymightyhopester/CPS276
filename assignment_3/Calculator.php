<?php
class Calculator{
    
    public function calc($operator=null, $num1=null, $num2=null){
        
        if (is_null($operator) or is_null($num1) or is_null($num2))
        {
            return "Must enter a string and two numbers";
        }
        else if (is_string($operator) && is_int($num1) && is_int($num2))
        {
            if ($num2 == 0){
                return "Cannot divide by zero".". \n";
            }
            else{
                if($operator == "/"){

                    $x = $num1/$num2;
                    return "The division of the numbers is ".$x.". \n";

                }else if($operator == "*"){

                    $x = $num1*$num2;
                    return "The product of the numbers is ".$x.". \n";

                }else if($operator == "-"){

                    $x = $num1-$num2;
                    return "The difference of the numbers is ".$x.". \n";

                }else if($operator == "+"){

                    $x = $num1+$num2;
                    return "The sum of the numbers is ".$x.". \n";

                }else{
                    return "invalid operator";
                }
            }
        }
        else
        {
            return "Cannot divide by zero".". \n";
        }
    }

}
?>