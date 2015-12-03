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
    $AppList->fullAppPage();
}
$HtmlPage->BodyEnd();


