<?php
$size = [];
$isSymbols = $_POST ["use-symbols"] ?? 0;
$isNum = $_POST ["use-num"] ?? 0;
$isMaj = $_POST ["use-alpha-maj"] ?? 0;
$isMin = $_POST ["use-alpha-min"] ?? 0;

$html =<<<HTML
<head>
<meta = charset ="utf-8" />
<title>Password Generator</title>
</head>
<body>
<h1>Password Generator</h1>
<form method="POST" action="index003.php">
    <div>
        <label for="size" class="form-label">Taille</label>
        <select class="form-select" aria-label="Default select example" name="size">
            
            <option value= "8">8</option>
        </select>
    </div>
    <div class="">
      <input class="" type="checkbox" value="1" id="use-alpha-min" name="use-alpha-min" checked>
      <label class="" for="use-alpha-min">
        Utiliser les lettres minuscules (a-z)
      </label>
    </div>
    <div class="">
      <input class="" type="checkbox" value="1" id="use-alpha-maj" name="use-alpha-maj" checked>
      <label class="" for="use-alpha-maj">
        Utiliser les lettres majuscules (A-Z)
      </label>
    </div>
    <div class="">
      <input class="" type="checkbox" value="1" id="use-num" name="use-num"  checked>
      <label class="" for="use-num">
        Utiliser les chiffres (0-9)
      </label>
    </div>
    <div class="">
      <input class="" type="checkbox" value="1" id="use-symbols" name="use-symbols" checked>
      <label class="" for="use-symbols">
        Utiliser les symboles (!@#$%^&*())
      </label>
    </div>
    
    <div class="">
        <button type="submit" class="">Générer !</button>
    </div>
</form>
<h4>Veuillez générer un mot de passe.</h4>
<input type="password" placeholder="Mot de passe" />
</body>
HTML;
echo $html;