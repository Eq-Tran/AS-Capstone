<?php

class Calendar
{
    
     public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        echo "class initialized";
    }
 
    /* Class Properties */
    private $Curryear = 0;
    private $Currmonth = 0;
    private $DayLabels = array("Mon", "Tues", "Wed", "Thurs", "Fri", "Sat", "Sun");
    private $DaysinMonth = 0;
    private $CurrDate = null;
    private $naviHref = null;
    
    
    /* Class Functions */
    
    //Calculates # of days in month
    public function daysInMonth($month = null, $year = null){
        
        if($month == null){
            
            $month = date("m", time());
            
        }
        if($year == null){
            
            $year = date("Y", time());
        }
        
        return date("t", strtotime($year . '-' . $month . '01'));
    }
    
    // Calculates # of weeks in month counts an extra week for months that have lay over days
    public function weekInMonth($month = null, $year = null){
        
        if($month == null){
            
            $month = date("m", time());
            
        }
        if($year == null){
            
            $year = date("Y", time());
        }
        
        $daysInMonth = $this->daysInMonth($month, $year);
        $numOfWeeks = ($daysInMonth % 7 == 0 ? 0: 1) + intval($daysInMonth / 7);
        $lastDayInMonth = date("N", strtotime($year . '-' . $month .'-'. $daysInMonth));
        $firstDayInMonth = date("N", strtotime($year . '-' . $month .'-01'));
        
        if($lastDayInMonth > $firstDayInMonth){
            
            $numOfWeeks++;
            
        }
        return ($numOfWeeks);
    }
    
    // Shows the Nav labels
    public function createNavLabels(){
        
        $content = '';
        
        foreach($this->DayLabels as $index){
            
            // 
            $content .= '<li class="'.$index . 'title">' .$index.'</li>';
            
        }
        
        return ($content);
    }
    
    
}

$cal = new Calendar();

echo $cal->createNavLabels();
?>