<?php
class dates {
    
    public function today(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s');
    }
    
    public function database_today(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis');
    }
    
    public function database_datePlus24(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis',mktime () + 1 * 3600 * 24);
    }
    
    public function database_dateMinus24(){
        date_default_timezone_set('Europe/Athens');
        return date('YmdHis',mktime () - 1 * 3600 * 24);
    }    

    public function today_only_date(){
        date_default_timezone_set('Europe/Athens');
        return date('Y-m-d');
    }
    
    public function datePlus24(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s',mktime () + 1 * 3600 * 24);
    }
    
    public function dateMinus24(){
        date_default_timezone_set('Europe/Athens');
        return date('d/m/Y H:i:s',mktime () - 1 * 3600 * 24);
    }       
}
?>
