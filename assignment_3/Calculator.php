<?php
class Calculator{
    
    public function calc($operator, $num1, $num2){
        
        if ($operator.is_string && $num1.is_int && $num2.is_int)
        {
            if ($num2 == 0){
                return "Cannot divide by zero"
            }
            else{
                if($operator == "/"){

                    $x = $num1/$num2
                    return "The division of the numbers is ".$x

                }else if($operator == "*"){

                    $x = $num1*$num2
                    return "The product of the numbers is ".$x

                }else if($operator == "-"){

                    $x = $num1-$num2
                    return "The difference of the numbers is ".$x

                }else if($operator == "+"){

                    $x = $num1+$num2
                    return "The sum of the numbers is ".$x

                }else{
                    return "invalid operator"
                }
            }
        }
        else{
            return "Must enter a string and two numbers"
        }
    }

}
?>