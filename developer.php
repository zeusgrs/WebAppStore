<?php
error_reporting(-1);
ini_set('display_errors', 'On');

if(!session_start()){ session_start(); }

include_once 'core/pages.php';
include_once 'core/dates.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';
include_once 'core/upload.php';
include_once 'core/forms.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();
$Upload = new UploadFiles();
$Forms = new Forms();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Jquery("js/qrcode.js");

$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

echo "<div class='appContent'>";

$step = isset($_GET["step"]) ? $_GET["step"] : '';


if($step == NULL){
    $Forms->UploadApk();
    echo "<a href='developer.php?step=2'><input type='button' name='step' value='Next Step'></a>";
} elseif($step == 2) {
    $Forms->UploadImages();
    echo "<a href='developer.php?step=3'><input type='button' name='step' value='Next Step'></a>";
} elseif($step == 3 && $_SESSION["app_id"] != NULL) {
    echo "<a href='index.php?app_id=".$_SESSION["app_id"]."'><input type='button' name='step' value='Finish'></a>";
    session_unset();
    session_destroy();
    $_SESSION = array();
    session_regenerate_id();
}

echo "</div>";


   
$HtmlPage->BodyEnd();


