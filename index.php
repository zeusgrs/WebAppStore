<?php
include_once 'core/pages.php';
include_once 'core/databases.php';
include_once 'core/menus.php';

$HtmlPage = new HtmlPage();
$Database = new Database();
$Menus = new Menus();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

$Menus->Main();

$HtmlPage->BodyEnd();


