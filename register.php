<?php
// Connexion à la base de données et autres traitements PHP

// Vérification des données POST et traitement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $newUsername = $_POST['newUsername'];
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    // Connexion à la base de données (exemple)
    $mysqli = new mysqli('localhost', 'root', '', 'comparateur');
    if ($mysqli->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }

    // Requête d'INSERT pour insérer un nouvel utilisateur
    $query = "INSERT INTO utilisateurs (nom, prenom, email, username, password) 
              VALUES ('$nom', '$prenom', '$email', '$newUsername', '$newPassword')";

    if ($mysqli->query($query)) {
        echo '<div class="message">Inscription réussie.</div>';
        header("Location: index.php");
        exit;
    } else {
        echo '<div class="error">Erreur : ' . $mysqli->error . '</div>';
    }

    // Fermeture de la connexion
    $mysqli->close();
}
?>
