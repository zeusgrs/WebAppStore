<?php
class Database {

    /**
     * Open a database connection with parameters
     * if start method with out parameter load parameter from config.php file
     * @param type $dbhost 
     * @param type $dbuser
     * @param type $dbpass
     * @param type $dbname
     * 
     */
    public function Open($dbhost=NULL, $dbuser=NULL, $dbpass=NULL, $dbname=NULL){
        
        if($dbhost == NULL){include 'config.php';}
    
        $dbid = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
        mysqli_set_charset($dbid,'utf8');
        mysqli_select_db($dbid,$dbname);
        mysqli_query($dbid,' set character set utf8 ');
        mysqli_query($dbid,"SET NAMES 'utf8' ");
        return $dbid;
    }

    public function Close($dbid) {
        mysqli_close($dbid);
    }
}

?>
