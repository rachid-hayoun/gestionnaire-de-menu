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
<table border="2" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th>Plat</th>
            <th>Description</th>
            <th>Actions</th>
            <th>Actions</th>    
        </tr>
    </thead>
    <?php foreach ($recettes as $recette): ?>
        <tbody>
            <td><?php echo $recette['nom']; ?></td>
            <td><?php echo $recette['description']; ?></td>
            <td><input type="submit" value="Modifier"></td> 
            <td><input type="submit" value="Supprimer"></td>
        </tbody>
    <?php endforeach ?>
</table>
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

<h2>Ajouter un plat</h2>
<form action="" method="post">
    <label for="nom_plat">Nom du Nouveau Plat :</label><br>
    <input type="text" id="nom_plat" name="nom_plat" required><br><br>

    <label for="description">Description :</label><br>
    <textarea id="description" name="description" required></textarea><br><br>

    <input type="submit" value="Ajouter le Plat">
</form>
