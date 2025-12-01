<?php
require_once "inc/page.inc.php";
require_once "inc/database.inc.php";
$db = null;
try{
    $db = new DatabaseManager(
        "mysql:host=mysql;dbname=lowify;charset=utf8mb4",
        $username = "lowify",
        $password = "lowifypassword",
    );
} catch (PDOException $ex) {
    echo "Erreur lors du chargement";
}
try{
    $allArtists = $db ->executeQuery("SELECT * FROM artist");
}catch (PDOException $ex) {
    echo "Erreur lors de la requête";
}

$search = $_GET['id'] ?? 0;

$allArtistsAsHTML = "";
$iterator = 0;

    try{
        $Artist = $db ->executeQuery("SELECT * FROM artist");

        $topSongs = $db->executeQuery("SELECT * FROM song ORDER BY note DESC LIMIT 5");

        $album = $db ->executeQuery("SELECT * FROM album ORDER BY release_date DESC");
    }catch (PDOException $ex) {
        echo "Erreur lors de la requête";
    }
$html = <<<HTML
<link rel="stylesheet" href="style004.css">
<header>
<h1>Album</h1>
</header>
HTML;



$page = new HTMLPage("lowify");
$page ->addContent($html);

echo $page->render();