<?php
include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';
include_once 'core/qrcode.php';
include_once 'core/upload.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();
$Upload = new UploadFiles();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Jquery("js/qrcode.js");

$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

echo "<div class='appContent'>";

echo "<form method='POST' action='' id='submitApk' enctype='multipart/form-data'>";
echo "<input type='text' name='app_name' placeholder='Write your app name'><br/>";
echo "<textarea name='app_description' placeholder='Write your app description'></textarea><br/>";
echo "<input type='file' name='image' id='image'><br/>";
echo "<input type='submit' name='submit' value='Upload Image' /><br/>";
echo "</form>";

$Upload->Image("image");

echo "</div>";


   
$HtmlPage->BodyEnd();


