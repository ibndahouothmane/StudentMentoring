<?php

namespace Calendar;

class Month{
  
    public $days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        
    private $months= ['janvier',' février',' mars',' avril',' mai',' juin',' juillet',' août',' septembre',' octobre',' novembre',' décembre'];

    public $month;

    public $year;

    public function __construct(?int $month=null , ?int $year=null){

        if($month ===null || $month < 1 || $month >12){
            $month = intval(date('m'));
        }
        if($year ===null){
            $year = intval(date('Y'));
        }
        $this->month = $month;
        $this->year = $year;

    }

        public function getStartingDay():\DateTime{
           return new \Datetime("{$this->year}-{$this->month}-01");
        }
    //retourne le mois en toute lettre ex(mars 2018)

    public function toString():string{
       return $this->months[$this->month - 1].' '.$this->year;
    }

    public function withinMonth(\Datetime $date):bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
  }


    public function getWeeks():int{
    $start = $this->getStartingDay();
    $end =(clone $start)->modify('+1 month -1 day');
    $weeks =  intval($end->format('W')) - intval($start->format('W')) + 1;
    if($weeks < 0 ){
        $weeks = intval($end->format('W'));
    }
    return $weeks;
    }

    public function nextMonth(): Month{
        $month = $this->month + 1;
        $year = $this->year;

        if($month > 12){
            $month = 1;
            $year +=1;
        }
        return new Month($month,$year);
    }

    //renvoie le mois precedent
    public function PreviousMonth(): Month{
        $month = $this->month - 1;
        $year = $this->year;

        if($month < 1){
            $month = 12;
            $year -=1;
        }
        return new Month($month,$year);
    }
}



?>