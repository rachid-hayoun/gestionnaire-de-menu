<?php
try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());}
$sqlQuery = 'SELECT * FROM recettes ORDER BY id ASC';
$recettesStatement = $mysqlClient->prepare($sqlQuery);
$recettesStatement->execute();
$recettes = $recettesStatement->fetchAll();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomPlat = $_POST['nom_plat'];
    $description = $_POST['description'];

$insertQuery = 'INSERT INTO recettes (nom, description) VALUES (?, ?)';
$stmt = $mysqlClient->prepare($insertQuery);
$stmt->execute([$nomPlat, $description]);
}

$sqlQuery = 'SELECT * FROM recettes';
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
                <button>rachid</button>
            </div>
        </div>

    </header>
    <div class="banner">
    <?php include_once 'navbar.php'; ?>
        <div class="content">
            <img src="sanji_chef.jpg" alt="Chef Sanji">
        </div>
</form>
</form>
<table border="1" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th>Plat</th>
            <th>Description</th>
        </tr>
    </thead>
    <?php foreach ($recettes as $recette): ?>
        <tbody>
            <td><?php echo $recette['nom']; ?></td>
            <td><?php echo $recette['description']; ?></td>
        </tbody>
    <?php endforeach ?>
</table>
<h2>Ajouter un plat</h2>
<form action="" method="post">
    <label for="nom_plat">Nom du Nouveau Plat :</label><br>
    <input type="text" id="nom_plat" name="nom_plat" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <input type="submit" value="Ajouter le Plat">
