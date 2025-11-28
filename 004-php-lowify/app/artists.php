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
    echo "Erreur lors du chargement".$ex->getMessage();
}
$allArtists = [];
try{
    $allArtists = $db ->executeQuery("SELECT * FROM artist");
}catch (PDOException $ex) {
    echo "Erreur lors de la requête";
}

$search = $_GET['id'] ?? 0;

$allArtistsAsHTML = "";
$iterator = 0;

foreach ($allArtists as $artist) {
    $artistName = $artist["name"];
    $artistId = $artist["id"];
    $artistCover = $artist["cover"];

    if ($iterator % 5 == 0) {
        $allArtistsAsHTML = '<div class="row mb-4">';
    }
    $allArtistsAsHTML .= <<<HTML
    <div class="col-lg-3 col-md-6 mb-4">
        <a href="artists.php?id=$artistId" class="text-decoration-none text-white">
            <div class="card h-100 bg-dark text-white border-dark shadow">
                <img src="$artistCover" class="card-img-top rounded-circle" alt="Image 1">
                <div class="card-body bg-secondary-subtle  text-white">
                    <h5>$artistName</h5>
                </div>
            </div>
        </a>
    </div>
    
    HTML;
    if ($iterator % 4 == 3) {
        $allArtistsAsHTML .= '</div>';
    }

    $iterator++;
}$html = <<<HTML
    
    <div class="container bg-dark text-white p-4">
            <a href="index.php" class="link text-white"> < Retour à l'accueil</a>
    
        <h1 class="mb-4">Artistes</h1>
        
        <div>
        {$allArtistsAsHTML}
        </div>
    </div>
HTML;
$rawCSS = <<<CSS
div{
    display: flex;
}
CSS;



$page = new HTMLPage("lowify");
$page ->addContent($html);
$page ->addContent($rawCSS);
echo $page->render();