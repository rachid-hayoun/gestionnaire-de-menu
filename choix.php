
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix = $_POST['choix'];

    if ($choix == "categorie.php") {
        header("Location: categorie.php");
        exit();
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix = $_POST['choix'];

    if ($choix == "recette.php") {
        header("Location: recette.php");
        exit();
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix = $_POST['choix'];

    if ($choix == "ingredients.php") {
        header("Location: ingredients.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Baratie | Accueil</title>
</head>
<body>
    <header>
        <div class="title">
            <img src="Baratie.png" alt="Titre Baratie">
        </div>
        <div class="right">
            <div class="logo">
                <img src="logo.png" alt="Logo Baratie">
            </div>
            <div class="btn">
                <button><a href ="inscription.php">rachid</a></button>
            </div>
        </div>
    </header>
    <div class="banner">
        <div class="content">
            <img src="sanji_chef.jpg" alt="Chef Sanji">
    
    </div>
<div class="chois">
<h1>Bienvenue au Baratie</h1>
<form action="" method="post">
<select name="choix" id="choix" required>
            <option value="Proposition">Choisissez</option>
            <option value="categorie.php">Categorie</option>
            <option value="ingredients.php">Ingredients</option>
            <option value="recette.php">Recette</option>
        </select><br><br>
    <input type="submit" value="Valider">
    </div>
</form>
</body>
</html>

