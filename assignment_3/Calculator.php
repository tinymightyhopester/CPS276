<?php
class Calculator{
    
    public function calc($operator, $num1, $num2){
        
        try{
            if (is_string($operator) && is_int($num1) && is_int($num1))
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
                        return "The product of the numbers is ".$x."\n";

                    }else if($operator == "-"){

                        $x = $num1-$num2;
                        return "The difference of the numbers is ".$x."\n";

                    }else if($operator == "+"){

                        $x = $num1+$num2;
                        return "The sum of the numbers is ".$x."\n";

                    }else{
                        return "invalid operator";
                    }
                }
            }
        }catch (Exception $e){
            return "Must enter a string and two numbers";
        }
    }

}
?>