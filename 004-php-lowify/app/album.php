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
    $allAlbum = $db ->executeQuery("SELECT cover FROM artist");
}catch (PDOException $ex) {
    echo "Erreur lors de la requête";
}
$Search = $_GET['id'] ?? 0;