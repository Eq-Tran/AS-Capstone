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
    
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
    private $currYear = 0;
    private $currMonth = 0;
    private $currDay = 0;
    private $firOfMonth = 0;
    private $currDate = null;
    private $naviHref = null;
    private $daysinMon = null;
    
     public function __construct(){
        
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        echo 'this class "' . __CLASS__. '"was created';
    }
    
    public function showCalendar(){
        
        $year = date("Y", time());
        $month = date("m", time());
        
        $this->currYear = $year;
        $this->currMonth = $month;
        $this->daysinMon = $this->calculateDaysinMonth($month, $year);
    }
    
    private function calculateDaysinMonth($month, $year){
        
        $year = date("Y", time());
        $month = date("m", time());
        
        return date("t", strtotime($year . '-' . $month  .'-01'));
        
    }
    
    private function createNav(){
        
        //Ternary Operator if currMonth == 12 return 1 else return currMonth + 1
       $nxtMonth =  $this->currMonth == 12?1:intval($this->currMonth) + 1;
       $nxtYear = $this->currMonth == 12?intval($this->curryear) + 1:$this->currYear;
       $preMonth = $this->currMonth == 12?1:intval($this->currMonth) - 1; 
       $preYear = $this->currMonth == 12?intval($this->currYear) - 1:$this->currYear; 
       $nav =  '<div class="navHeader">'.
                   '<a class="prev" href="'. $this->naviHref . '?month='.sprintf('%02d', $preMonth).'&year='.$preYear.'">Prev</a>'.
                   '<span class="title">'.date("Y","m", strtotime($this->currYear.'-'.$this->currMonth.'-1')).'</span>'.
                   '<a class="prev" href="'. $this->naviHref . '?month='.sprintf('%02d', $nxtMonth).'&year='.$nxtYear.'">Next</a>';
       return($nav);
    }

}
$obj = new Calendar();
?>