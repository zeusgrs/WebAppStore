<?php
include_once 'core/pages.php';
include_once 'core/databases.php';

$HtmlPage = new HtmlPage();
$Database = new Database();

$HtmlPage->HeadStart("WebAppStore ver 0.1");

$HtmlPage->Stylesheet("css/style.css");
$HtmlPage->Jquery();
$HtmlPage->Lightbox();
        
$HtmlPage->HeadEnd();

$HtmlPage->BodyStart();

echo "Hello World";

$HtmlPage->BodyEnd();


