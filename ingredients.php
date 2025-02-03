<?php
try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());}
$sqlQuery = 'SELECT * FROM ingredients';
$ingredientsStatement = $mysqlClient->prepare($sqlQuery);
$ingredientsStatement->execute();
$ingredients= $ingredientsStatement->fetchAll();
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
                <button>rachid</button>
            </div>
        </div>
    </header>
    <div class="banner">
    <?php include_once 'navbar.php'; ?>

        <div class="content">
            <img src="sanji_chef.jpg" alt="Chef Sanji">
        </div>
<table border="2" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th>Plat</th>
            <th>Composition</th>
        </tr>
    </thead>
    <?php foreach ($ingredients as $ingredient): ?>
        <tbody>
            <td><?php echo $ingredient['nom']; ?></td>
            <td><?php echo $ingredient['Composition']; ?></td>

        </tbody>
    <?php endforeach ?>
</table>
