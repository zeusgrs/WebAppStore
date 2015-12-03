<?php
include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';
include_once 'core/qrcode.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Jquery("js/qrcode.js");
$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

$appid = $_GET["appid"];

if($appid == null){
    echo "<div class='appsList'>";
    $stars = 5;
    while($i < 20){
        if($stars < 0){$stars = 5;}
        $AppList->singleAppCard("Webtouch Voip Client","Webtouch.gr","images/app/webtouchvoipclient.jpg",$stars,"?appid=1");
        $i++;
        $stars--;
    }
    echo "</div>";
} else {
    
    echo "<div class='appContent'>";

    echo "<div class='appHead'>";
        echo "<div class='appHeadPhoto'>";
        echo "<img src='images/app/webtouchvoipclient.jpg' width='312px'>";
        echo "</div>";
        
        echo "<div class='appTitle'>";
        echo "<h1>Webtouch Voip Client</h1>";
        echo "</div>";

        echo "<div class='appDeveloper'>";
        echo "Webtouch.gr";
        echo "</div>";        

        echo "<div class='appDate'>";
        echo "Date: 03 December 2015";
        echo "</div>";  

        echo "<div class='appCategory'>";
        echo "Category: Communication";
        echo "</div>"; 
        
        echo "<div class='appRate'>Rate:</div><div class='appStars app5Stars'></div> <div class='appUsers'>( 25.534 )</div><br>"; 

        echo "<div class='appDownloads'>";
        echo "Downloads: 152.352";
        echo "</div>"; 
        
        echo "<div class='downloadIconBig'></div>"; 
        
        echo "<div id='appQRcode'></div>";        
        
    echo "</div>";

    echo "<div class='appMedia'>";
    
    echo "</div>";    
    
    echo "<div class='appBody'>";
    
    echo "</div>";
    
    echo "</div>";
    
    echo "<script>jQuery('#appQRcode').qrcode({width: 110,height: 110,text: 'http://www.webtouch.gr'});</script>";
    
}
$HtmlPage->BodyEnd();


