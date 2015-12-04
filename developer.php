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
echo "App APK: <input type='file' name='apk'><br/>";
echo "App Icon: <input type='file' name='icon'><br/>";
echo "ScreenShot 1: <input type='file' name='image1'><br/>";
echo "ScreenShot 2: <input type='file' name='image2'><br/>";
echo "ScreenShot 3: <input type='file' name='image3'><br/>";
echo "ScreenShot 4: <input type='file' name='image4'><br/>";
echo "<input type='submit' name='submit' value='Upload App' /><br/>";
echo "</form>";

foreach ($_FILES as $key => $value){
    if (strpos($key,"icon") !== false || strpos($key,"image") !== false){
        if($value["size"] > 0){
            $Upload->Image($key);
        }
    }
    
    if (strpos($key,"apk") !== false){
        if($value["size"] > 0){
            $Upload->Apk($key);
        }
    }    
}

echo "</div>";


   
$HtmlPage->BodyEnd();


