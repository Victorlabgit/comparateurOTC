<?php
// filtreproduits.php
// Connexion à la base de données (connexion2.php)
require_once 'connexion2.php';

// Récupérer les réponses du formulaire
$question1 = $_POST['question1'];
// Récupérer d'autres réponses

// Exemple de requête pour filtrer les produits adaptés
$sql = "SELECT * FROM produits WHERE COL 3 = :partie_du_corps AND COL 4 = :produit AND COL 5 = :preoccupation AND COL 6 = :twist";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':partie_du_corps', $partie_du_corps);
$stmt->bindParam(':produit', $produit);
$stmt->bindParam(':preoccupation', $preoccupation);
$stmt->bindParam(':twist', $twist);

// Assigner les valeurs récupérées du formulaire aux paramètres de la requête
$partie_du_corps = $_POST['partie_du_corps'];
$produit = $_POST['produit'];
$preoccupation = $_POST['preoccupation'];
$twist = $_POST['twist'];

// Exécuter la requête
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Utiliser les résultats pour afficher les produits dans votre interface
// Par exemple, générer du HTML dynamiquement avec les produits filtrés
foreach ($resultats as $produit) {
    echo '<div class="produit">' . $produit['nom'] . '</div>';
}
?>
