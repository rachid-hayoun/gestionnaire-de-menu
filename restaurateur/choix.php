
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
    <title>Choix restaurateur</title>
</head>
<body>
<h1>Bienvenue au Baratie</h1>
<form action="" method="post">
<select name="choix" id="choix" required>
            <option value="Proposition">Choisissez</option>
            <option value="categorie.php">Categorie</option>
            <option value="ingredients.php">Ingredients</option>
            <option value="recette.php">Recette</option>
        </select><br><br>
    <input type="submit" value="Valider">
</form>
</body>
</html>

