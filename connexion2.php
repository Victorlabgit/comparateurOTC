<!-- FICHIER PHP POUR CONNEXION A LA BASE DE DONNEES PRODUITS -->
 
<?php
// Paramètres de connexion
$servername = "localhost"; // Nom du serveur
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe
$dbname = "produitsbetaotc"; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

?>
