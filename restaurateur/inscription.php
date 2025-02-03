<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['inscription'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $numero = $_POST['numero'];
        $log = $_POST['identifiant'];
        $mdp = $_POST['motdepasse'];

        try {
            $insertQuery = 'INSERT INTO logs (nom, prenom, mail, numero, identifiant, motdepasse) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $mysqlClient->prepare($insertQuery);
            $stmt->execute([$nom, $prenom, $mail, $numero, $log, $mdp]);
        } catch (Exception $e) {
        }
        header('Location: choix.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Baratie | Page de Connexion</title>
</head>
<body>
    <div class="background">
        <div class="container">
            <div class="log">
                <div class="logo">
                    <img src="Baratie.png" alt="Titre Barentie">
                </div>
    <h1 class="titree">Inscription Restaurateur</h1>
    <form action="" method="post">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="mail">Mail :</label><br>
        <input type="email" id="mail" name="mail" required><br><br>

        <label for="numero">Numéro :</label><br>
        <input type="text" id="numero" name="numero"><br><br>

        <label for="identifiant">Identifiant :</label><br>
        <input type="text" id="identifiant" name="identifiant" required><br><br>

        <label for="motdepasse">Mot de passe :</label><br>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>

        <input type="submit" name="inscription" value="S'inscrire">
    </form>
    <div class="btn">
    <button><a href ="log.php">J'ai déjà un compte</a></button>
    </div>
</button>