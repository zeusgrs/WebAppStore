<?php
include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

echo "<div class='appsList'>";

while($i < 20){
    $AppList->singleAppCard("Webtouch Voip Client","Webtouch.gr","images/app/webtouchvoipclient.jpg",5,"#");
    $i++;
}
echo "</div>";

$HtmlPage->BodyEnd();


