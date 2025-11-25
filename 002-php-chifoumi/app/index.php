<?php
$pierre = "Pierre" ;
$feuille = "Feuille";
$ciseaux = "Ciseaux";
$choixPHP = [$pierre, $feuille, $ciseaux];
$php = $choixPHP[array_rand($choixPHP)];
$choixuser = [$pierre, $feuille, $ciseaux];
if ($choixuser == $php) {
    $result = "Égalité !";
}
elseif(
    ($choixuser == "Pierre" && $php === "Ciseaux") ||
    ($choixuser == "Feuille" && $php === "Pierre") ||
    ($choixuser == "Ciseaux" && $php === "Feuille")
) {
    $result= "Vous avez gagnez";
}
else {
    $result= "PHP gagne";
}
$head=<<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Competition pierre, feuille, cisaux !</title>
</head>
<body>
<h1>Pierre - Feuille - Ciseaux</h1>
<button>Pierre</button>
<button>Feuille</button>
<button>Ciseaux</button>
</body>
</html>
HTML;


echo $head;
