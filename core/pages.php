<?php
class htmlPage {
    public function headStart($title) {
        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
        echo "<html>\n";
        echo "<head>\n";
        echo "<title>$title</title>\n";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>\n";
    }

    public function headEnd() {
        echo "</head>\n";
    }
    
    public function bodyStart() {
        echo "<body>\n";
    }
    
    public function bodyEnd() {
        echo "</body>\n";
        echo "</html>\n";
    }
    
    public function stylesheet ($file) {
        echo "<link rel='stylesheet' type='text/css' href='$file'/>\n";
    }

    public function javascript ($file) {
        echo "<script type='text/JavaScript' src='$file'></script>\n";
    }
    
    public function jquery ($file=NULL) {
        if($file == NULL){
            echo "<script src='//code.jquery.com/jquery-1.11.0.min.js'></script>\n";
            echo "<script src='//code.jquery.com/jquery-migrate-1.2.1.min.js'></script>\n";        
            echo "<script src='//code.jquery.com/ui/1.11.2/jquery-ui.js'></script>\n";
        } else {
            echo "<script src='$file'></script>\n";
        }
    }
    
    public function jqueryMobile() {
            echo "<script src='//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>\n";
    }      

    public function lightbox() {
        echo "<link rel='stylesheet' type='text/css' href='core/lightbox/css/lightbox.css'/>\n";
        echo "<script src='core/lightbox/js/lightbox.js'></script>\n";
    }
    
    public function clearDivs() {
        echo "<div class='clear'></div>\n";
    }
    
    public function makeHtmlSpaces ($number) {
        while($i < $number) {
            echo "&nbsp;";
            $i++;
        }
    }
    
    public function reloadPage ($sec=0){
        $page = $_SERVER['PHP_SELF'];
        if($sec == NULL) { $sec = 0; }
        echo "<meta http-equiv='refresh' content='$sec'>";
    }
    
    public function redirectPage ($url,$sec=0){
        if($sec == NULL) { $sec = 0; }
        if($url == NULL) { $url = "#"; }
        echo "<script>    window.setTimeout(function(){
                          window.location.href = '$url';
                          }, ".$sec."000);</script>";
        //echo "<meta http-equiv='refresh' content='$sec;URL=$url'>";
    }
    
    public function checkLoadTimeStartPoint (){
        global $time,$start;
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $start = $time;
    }
    
    public function checkLoadTimeEndPoint (){
        global $time,$start;
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        echo '<center>Page generated in '.$total_time.' seconds.</center>';  
    }     
}
?>
