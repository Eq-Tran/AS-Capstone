<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Shippee Credit Interest </title>
    </head>
    <body>
        
        <h2> Credit Interest Monthly Payments </h2>

        <form action="shippeeCreditCard.php" method="post">

            <!-- Input -->
            Credit:
            <input type="text" value="" name="credit">
            Interest Rating:
            <input type="text" value="" name="interest">
            Monthly Payments:
            <input type="text" value="" name="monthly">

            <!-- Button -->
            <input type="submit" value="Calculate!" name="btnCalc">

        </form>
        
        <?php
        
            if (filter_input(INPUT_POST, 'btnCalc'))
            {
            
                $owe = filter_input(INPUT_POST, 'credit'); 
                $interest = filter_input(INPUT_POST, 'interest'); 
                $payment = filter_input(INPUT_POST, 'monthly'); 

            
                echo "<table align='left' border='3'>";
                echo "<th> Months </th>";
                echo "<th> Interest </th>";
                echo "<th> Still Owed </th>";

                //Stored Balance
                $cC = $owe; 

            for ($i = 0; $owe > 0; $i++)
            {

                //Calulation for Interest 
                $paid = $owe * $interest / 100 / 12;
                
                //Interest Payments
                $bill = $owe + $paid; 

                //Balance Remainder
                $remainder = $owe - $payment + $paid;


                if($paid > $remainder)
                {
                    $remainder = "";
                }

                echo "<tr>";
                $rowMonth = $i + 1; 
                $rowInterest = '$' .number_format((float)$paid, 2);
                $rowRemainder = '$'.number_format((float)$remainder, 2);

                echo "<td> $rowMonth </td>";
                echo "<td> $rowInterest </td>";
                echo "<td> $rowRemainder </td>";

                echo "</tr>";

                $owe = $remainder;


            }

            echo "</table>";

            $total = $cC + $bill;
            echo "<br>", "You paid over " .$rowMonth, " months equals out to $".number_format((float)$total, 2);
            
            }
            
            else
            {
                
                echo "<br>", "Interest Payments Populate Here";
                
            }

        ?>
    </body>
</html>
