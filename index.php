<?php
error_reporting(-1);
ini_set('display_errors', 'On');

if(!session_start()){ session_start(); }

include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';
include_once 'core/plugins.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();
$Plugin = new Plugins();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Jquery("js/qrcode.js");

$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

if(isset($_GET["app_id"])){
    $app_id = $_GET["app_id"];
} else {
    $app_id = NULL;
}

if(isset($_GET["cat"])){
    $cat = $_GET["cat"];
} else {
    $cat = NULL;
}

if($app_id == NULL && $cat == NULL){
    echo "<div class='appsList'>";
    $stars = 5;
    $i = 0;
    while($i < 20){
        if($stars < 0){$stars = 5;}
        $AppList->SingleAppCard(1);
        $i++;
        $stars--;
    }
    echo "</div>";
}

if($app_id != NULL){
    $AppList->FullAppPage($app_id);
}

if($cat != NULL){
    $AppList->AllAppList($cat);
}

$HtmlPage->BodyEnd();


