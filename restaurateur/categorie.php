<?php
try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());}
$sqlQuery = 'SELECT * FROM categories';
$categoriesStatement = $mysqlClient->prepare($sqlQuery);
$categoriesStatement->execute();
$categories = $categoriesStatement->fetchAll();
?>
<table border="2" cellpadding="5 cellspacing="0">
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>
    <?php foreach ($categories as $categorie): ?>
        <tbody>
            <td><?php echo $categorie['nom']; ?></td>
        </tbody>
    <?php endforeach ?>
</table>
