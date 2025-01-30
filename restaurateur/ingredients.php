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
