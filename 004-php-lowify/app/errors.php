<?php
require_once "inc/page.inc.php";
$message = $_GET["message d'erreur"] ?? "Erreur inconnue";

$html = <<<HTML
<h1>$message</h1>
HTML;
$page = new HTMLPage("lowify");
$page ->addContent($html);

echo $page->render();