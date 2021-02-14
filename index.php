<?php
function fromDecimalToBinary($decimalNumber){
    
    while($decimalNumber >= 2){
        
        echo $decimalNumber%2; 
        $decimalNumber /= 2;
    }
}

fromDecimalToBinary(60);

phpinfo();

?>
