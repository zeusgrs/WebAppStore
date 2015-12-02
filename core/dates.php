<?php
class Dates {
    
    public function Today(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s');
    }
    
    public function DatabaseToday(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis');
    }
    
    public function DatabaseDatePlus24(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis',mktime () + 1 * 3600 * 24);
    }
    
    public function DatabaseDateMinus24(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis',mktime () - 1 * 3600 * 24);
    }    

    public function TodayOnlyDate(){
        date_default_timezone_set('Europe/Athens');
        return date('Y-m-d');
    }
    
    public function DatePlus24(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s',mktime () + 1 * 3600 * 24);
    }
    
    public function DateMinus24(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s',mktime () - 1 * 3600 * 24);
    }       
}
?>
