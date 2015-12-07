<?php
error_reporting(-1);
ini_set('display_errors', 'On');

if(!session_start()){ session_start(); }

include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';
include_once 'core/applist.php';
include_once 'core/plugins.php';
include_once 'core/forms.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();
$AppList = new AppList();
$Plugin = new Plugins();
$Var = new Forms();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Jquery("js/qrcode.js");

$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

$app_id = isset( $_GET["app_id"]) ? $_GET["app_id"] : '';
$category = isset( $_GET["category"]) ? $_GET["category"] : '';
$developer = isset( $_GET["developer"]) ? $_GET["developer"] : '';

if($app_id == NULL && $category == NULL && $developer == NULL){
    $AppList->AllAppList();
}

if($app_id != NULL){
    $AppList->FullAppPage($app_id);
}

if($category != NULL){
    $AppList->AllAppListFromCategory($category);
}

if($developer != NULL){
    $AppList->AllAppListFromDeveloper($developer);
}

$HtmlPage->BodyEnd();


