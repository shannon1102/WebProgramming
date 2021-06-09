<?php
include "./page.php";

$title = $_GET["title"];
$year = $_GET["year"];
$copyright = $_GET["copyright"];
$content = $_GET["content"];

$page = new page($title,$year,$copyright);

$page->addContent($content);
echo $page->get();


