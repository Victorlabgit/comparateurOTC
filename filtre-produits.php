<?php

// Inclure le fichier de connexion à la base de données
include 'connexion2.php';

// Récupération des valeurs envoyées par le formulaire en GET
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';
$type_produit = isset($_GET['type-produit']) ? $_GET['type-produit'] : '';
$preoccupation = isset($_GET['preoccupation']) ? $_GET['preoccupation'] : '';
$twist = isset($_GET['twist']) ? $_GET['twist'] : '';

// Construction de la requête SQL en fonction des critères sélectionnés
$sql = "SELECT `COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11` FROM `produits` WHERE 1";

if (!empty($categorie)) {
    $sql .= " AND `COL 3` = '$categorie'";
}

if (!empty($type_produit)) {
    $sql .= " AND `COL 4` = '$type_produit'";
}

if (!empty($preoccupation)) {
    // Utilisation de LIKE pour rechercher la préoccupation dans les valeurs séparées par des virgules
    $sql .= " AND FIND_IN_SET('$preoccupation', `COL 5`) > 0";
}

if (!empty($twist)) {
    $sql .= " AND `COL 6` = '$twist'";
}

// Exécution de la requête SQL
$result = $conn->query($sql);

// Tableau pour stocker les produits filtrés
$products = array();

// Vérification des résultats de la requête
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();

// Renvoyer les produits au format JSON
echo json_encode($products);
?>
