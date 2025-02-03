<?php
try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());}
$sqlQuery = 'SELECT * FROM recettes ORDER BY id ASC LIMIT 3';
$recettesStatement = $mysqlClient->prepare($sqlQuery);
$recettesStatement->execute();
$recettes = $recettesStatement->fetchAll();
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
            <button><a href ="inscription.php">Se connecter<br>ou<br>S'inscrire</a></button>
            </div>
        </div>
    </header>
    
    <div class="banner">
        <div class="content">
            <img src="sanji_chef.jpg" alt="Chef Sanji">
        </div>
        <section class="galerie" id="Galerie">
            <div class="slider" style="
                --width: 414px;
                --height: 377px;
                --quantity: 9;
                ">
                <div class="list">
                    <div class="item" style="--position: 1"><img src="chawanmushi1.jpg" alt=""></div>
                    <div class="item" style="--position: 2"><img src="sunomono1.jpg" alt=""></div>
                    <div class="item" style="--position: 3"><img src="gyoza1.jpg" alt=""></div>
                    <div class="item" style="--position: 4"><img src="sushi1.jpg" alt=""></div>
                    <div class="item" style="--position: 5"><img src="ramen.jpg" alt=""></div>
                    <div class="item" style="--position: 6"><img src="corn_dogs1.jpg" alt=""></div>
                    <div class="item" style="--position: 7"><img src="mochi1.jpg" alt=""></div>
                    <div class="item" style="--position: 8"><img src="kakikori1.jpg" alt=""></div>
                    <div class="item" style="--position: 9"><img src="anmitsu1.jpg" alt=""></div>
                </div>
            </div>
        </section>
    </div> 
    <table border="0" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th colspan="3">Entrées</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($recettes as $recette): ?>
            <tr>
                <td><?php echo "<img class='image-carre' src='chawanmushi1.jpg'". $recette['nom'] . "/>"; ?></td>
                <td><?php echo $recette['description']; ?></td>
                <td><?php echo $recette['prix']; ?></td>
            </tr>
    <?php endforeach ?>
<?php
    $sqlQuery = 'SELECT * FROM recettes ORDER BY id ASC LIMIT 3 OFFSET 3';
$recettesStatement = $mysqlClient->prepare($sqlQuery);
$recettesStatement->execute();
$recettes = $recettesStatement->fetchAll();
?>
    <table border="0" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th colspan="3">Plats</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($recettes as $recette): ?>
            <tr>
            <td><?php echo "<img class='image-carre' src='ramen.jpg'". $recette['images'] . "/>"; ?></td>
            <td><?php echo $recette['description']; ?></td>
            <td><?php echo $recette['prix']; ?></td>
            </tr>
    <?php endforeach ?>
    <?php
    $sqlQuery = 'SELECT * FROM recettes ORDER BY id DESC LIMIT 3';
$recettesStatement = $mysqlClient->prepare($sqlQuery);
$recettesStatement->execute();
$recettes = $recettesStatement->fetchAll();
?>
    <table border="0" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th colspan="3">Désserts</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($recettes as $recette): ?>
            <tr>
                
            <td><?php echo "<img class='image-carre' src='mochi1.jpg'". $recette['images'] . "/>"; ?></td>
            <td><?php echo $recette['description']; ?></td>
            <td><?php echo $recette['prix']; ?></td>
            </tr>
    <?php endforeach ?>
</body>
</html>
