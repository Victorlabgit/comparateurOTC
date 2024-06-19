<!-- FICHIER PHP POUR CONNEXION UTILISATEUR -->
<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "comparateur"; // Nom de votre base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Requête pour vérifier les informations de connexion
$sql = "SELECT id, username, password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Utilisateur trouvé, vérification du mot de passe
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Connexion réussie !";
        // Ici, vous pouvez démarrer une session et stocker des informations sur l'utilisateur
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Aucun utilisateur trouvé avec ce nom d'utilisateur.";
}

$conn->close();
?>
