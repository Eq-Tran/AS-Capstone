<?php

class Calendar {
    
    
    /******** Calendar Class ********/
    
    /*
     *  
    $totalDaysInMonth = date("t");
    $currDayInMonth = date("j");
    $lastDayInMonth = $totalDaysInMonth;
    $numOfWeeksInMonth = (int)($totalDaysInMonth / 7);
    $numOfDaysInWeek = (int)($totalDaysInMonth / 4);

     var_dump($numOfWeeksInMonth);
     var_dump($numOfDaysInWeek);
     * 
     */
     public function __construct(){
        
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        echo 'this class "' . __CLASS__. '"was created';
    }
    
    
    private $currYear = 0;
    private $currMonth = 0;
    private $currDay = 0;
    private $firOfMonth = 0;
    private $currDate = null;
    private $naviHref = null;
    
   
    

}
$obj = new Calendar();
?>