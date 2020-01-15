<?php

for ($i = 1; $i <=100; $i++) //initialize array
{
    
    $output = '';

	if ($i % 2 == 0) //Fizz is number in array is multiple of 2
	{
		$output .= 'Fizz';
	}

	if ($i % 3 == 0) //Buzz if number in array is multiple of 3
	{
		$output .= 'Buzz'; 
	}
        
        if ($i % 2 + 3 == 0) //FizzBuzz if number in array is multiple of 2 and 3
        {
            $output .= 'FizzBuzz';
        }

	if (!$output) //Output Array
	{
		$output = $i;
	}

	echo $output . "\n <br>"; //Display Output

	
	//Ian S
}
?>

