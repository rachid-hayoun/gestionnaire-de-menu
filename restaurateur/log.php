<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=baratie;charset=utf8', 'root', '');
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['connexion'])) {
    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

    try {
        $query = 'SELECT * FROM logs WHERE identifiant = ? AND motdepasse = ?';
        $stmt = $mysqlClient->prepare($query);
        $stmt->execute([$identifiant, $motdepasse]);
        $user = $stmt->fetch();

    } catch (Exception $e) {}
    header('Location: choix.php');
    exit();
}
?>
    <h1>Connexion Restaurateur</h1>
    <form method="post" action="">
        <label for="identifiant">Identifiant :</label><br>
        <input type="text" id="identifiant" name="identifiant" required><br><br>

        <label for="motdepasse">Mot de passe :</label><br>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>

        <input type="submit" name="connexion" value="Valider">
    </form>
</body>
</html>
