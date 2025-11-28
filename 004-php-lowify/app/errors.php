<?php
require_once "inc/page.inc.php";
$message = $_GET["message"] ?? 0;
echo "<h1>$message</h1>";
$html = <<<HTML

HTML;
