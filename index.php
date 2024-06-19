<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta OTC</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
    
    <style>

    </style>
</head>
<body>

<!-- Vidéo de fond -->
<video autoplay muted loop id="bg-video">
    <source src="backgroundvideo.mp4" type="video/mp4">
</video>
<header>
        
    <h1>CARE & COMPARE</h1>
                       
                    
    <!-- CONNEXION -->

    <div class="container">
            <aside class="sidebar">
                <h2>Espace utilisateur</h2>
                <div id="userPanel">
                    <button onclick="toggleLoginForm()">Se connecter</button>
                    <button onclick="toggleRegistrationForm()">S'inscrire</button>
                </div>   

                <?php
                session_start();

                // Vérifier si l'utilisateur est connecté
                $loggedIn = isset($_SESSION['username']);

                // Définir des variables pour les messages de succès et d'erreur
                $successMessage = '';
                $errorMessage = '';

                // Vérifier si un message de succès est défini dans la session
                if (isset($_SESSION['success_message'])) {
                 $successMessage = $_SESSION['success_message'];
                 unset($_SESSION['success_message']); // Supprimer la variable de session après affichage
                }

// Vérifier si un message d'erreur est défini dans la session
                if (isset($_SESSION['error_message'])) {
                  $errorMessage = $_SESSION['error_message'];
                  unset($_SESSION['error_message']); // Supprimer la variable de session après affichage
                }
?>
    <?php if ($loggedIn): ?>
        <div class="bubble"><?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
        <?php if (!empty($successMessage)): ?>
            <div class="message" id="successMessage"><?php echo $successMessage; ?></div>
            <script>
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                }, 3000);
            </script>
        <?php endif; ?>
        <form action="logout.php" method="post">
            <button type="submit">Déconnexion</button>
        </form>
    <?php else: ?>
        <?php if (!empty($errorMessage)): ?>
            <div class="message" style="background-color: #e74c3c;"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <div id="loginForm" class="form-container">
            <h3>Connexion</h3>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Se connecter</button>
            </form>
        </div>
        <div id="registrationForm" class="form-container">
            <h3>Inscription</h3>
            <form action="register.php" method="post">
                <label for="newUsername">Nom d'utilisateur:</label>
                <input type="text" id="newUsername" name="newUsername" required><br><br>
                
                <label for="newPassword">Mot de passe:</label>
                <input type="password" id="newPassword" name="newPassword" required><br><br>
        
                <!-- Champs supplémentaires -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
        
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required><br><br>
        
                <label for="nom">Nom de famille:</label>
                <input type="text" id="nom" name="nom" required><br><br>
        
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    <?php endif; ?>
        </div>
</header>
<!-- FIN DE CONNEXION -->

<!-- SECTIONS DES FILTRES -->
<section id="filters-bar-1">
    <h2>Filtres Cures</h2>
    <form id="filters-form" method="GET" action="">
    <div style="display: none;">
        <label for="partie-du-corps"></label>
        <select id="partie-du-corps" name="categorie"onchange="updateDropdowns()">
            <option value="">Toutes les parties</option>
            <option value="Mon Visage">Mon Visage</option>
            <option value="Mon Corps">Mon Corps</option>
            <option value="Mes Cheveux">Mes Cheveux</option>
            <option value="Bien-Être">Bien-Être</option>
        </select>
        </div>
            <label for="produit">Je cherche:</label>
            <select id="produit" name="type-produit">
                <option value="">Tous types de produits</option>
                <optgroup label="Visage">
                    <option value="Sérum visage">Sérum visage</option>
                    <option value="Crème visage">Crème</option>
                    <option value="Lotion visage">Lotion</option>
                    <option value="Spray / Brume visage">Spray / Brume</option>
                    <option value="Nettoyant / Démaquillant visage">Nettoyant / Démaquillant</option>
                    <option value="Masque visage">Masque</option>
                    <option value="Gommage visage">Gommage</option>
                    <option value="Huile visage">Huile</option>
                    <option value="Teinté visage">Teinté</option>
                    <option value="Nuit visage">Nuit</option>
                    <option value="Jour visage">Jour</option>
                    <option value="Yeux visage">Yeux</option>
                    <option value="Lèvres visage">Lèvres</option>
                </optgroup>
                <optgroup label="Corps">
                    <option value="Soins de douche">Soins de douche</option>
                    <option value="Crèmes et gommages corps">Crèmes et gommages corps</option>
                    <option value="Soins mains et ongles">Soins mains et ongles</option>
                    <option value="Gommages corps">Gommages corps</option>
                    <option value="Soins solaires corps et autobronzant">Soins solaires corps et autobronzant</option>
                    <option value="Huile corps">Huile corps</option>
                    <option value="Hygiène corporelle">Hygiène corporelle</option>
                    <option value="Roll-on">Roll-on</option>
                </optgroup>
                <optgroup label="Cheveux">
                    <option value="Soins cheveux et cuir chevelu">Soins cheveux et cuir chevelu</option>
                    <option value="Shampoings activés">Shampoings activés</option>
                    <option value="Masques et démêlants">Masques et démêlants</option>
                    <option value="Soins barbe">Soins barbe</option>
                    <option value="Pousses & repousses">Pousses & repousses</option>
                    <option value="Routine">Routine</option>
                </optgroup>
                <optgroup label="Bien-Être">
                    <option value="Huiles essentielles">Huiles essentielles</option>
                    <option value="Phytothérapie">Phytothérapie</option>
                    <option value="Complément alimentaire">Complément alimentaire</option>
                    <option value="Lithothérapie">Lithothérapie</option>
                    <option value="Sport">Sport</option>
                </optgroup>
            </select>

            <label for="preoccupation">Pour:</label>
            <select id="preoccupation" name="preoccupation">
                <option value="">Toutes les préoccupations</option>
                <optgroup label="Visage">
                    <option value="Rides & perte de fermeté">Rides & perte de fermeté</option>
                    <option value="Points noirs & pores dilatés">Points noirs & pores dilatés</option>
                    <option value="Teint terne">Teint terne</option>
                    <option value="Tâches pigmentaires, marques">Tâches pigmentaires, marques</option>
                    <option value="Hyperpigmentation post-inflammatoire">Hyperpigmentation post-inflammatoire</option>
                    <option value="Peau brillante">Peau brillante</option>
                    <option value="Boutons/acnée">Boutons/acnée</option>
                    <option value="Peau sèche & déshydratée">Peau sèche & déshydratée</option>
                    <option value="Sécheresse cutanée">Sécheresse cutanée</option>
                    <option value="Cernes & poches">Cernes & poches</option>
                    <option value="Glow">Glow</option>
                </optgroup>
                <optgroup label="Corps">
                    <option value="Sécheresse cutanée">Sécheresse cutanée</option>
                    <option value="Poils incarnés">Poils incarnés</option>
                    <option value="Vergetures / Minceur">Vergetures / Minceur</option>
                    <option value="Bronzage">Bronzage</option>
                    <option value="Hygiène intime">Hygiène intime</option>
                    <option value="Transpiration">Transpiration</option>
                    <option value="Peau douce">Peau douce</option>
                    <option value="Anti-âge">Anti-âge</option>
                </optgroup>
                <optgroup label="Cheveux">
                    <option value="Cheveux secs">Cheveveux fourchus/abîmés">Cheveux fourchus/abîmés</option>
                    <option value="Pellicules">Pellicules</option>
                    <option value="Démangeaisons">Démangeaisons</option>
                    <option value="Cuir chevelu gras">Cuir chevelu gras</option>
                    <option value="Psioriasis">Psioriasis</option>
                    <option value="Cheveux bouclés">Cheveux bouclés</option>
                    <option value="Brillance">Brillance</option>
                    <option value="Perte de cheveux">Perte de cheveux</option>
                </optgroup>
                <optgroup label="Bien-Être">
                    <option value="Stress et anxiété">Stress et anxiété</option>
                    <option value="Trouble du sommeil">Trouble du sommeil</option>
                    <option value="Vitamines & énergie">Vitamines & énergie</option>
                    <option value="Inconfort urinaire">Inconfort urinaire</option>
                    <option value="Règles douloureuses">Règles douloureuses</option>
                    <option value="Articulations & muscles">Articulations & muscles</option>
                </optgroup>
            </select>

            <label for="twist">Avec un twist:</label>
            <select id="twist" name="twist">
                <option value="">Tous les twists</option>
                <option value="Bio">Bio</option>
                <option value="Made in France">Made in France</option>
                <option value="Good for the planet">Good for the planet</option>
                <option value="Naturalité">Naturalité</option>
                <option value="Noté sur Yuka">Noté sur Yuka</option>
                <option value="Vegan">Vegan</option>
                <option value="Gluten free">Gluten free</option>
                <option value="Slow cosmétique">Slow cosmétique</option>
                <option value="Pas testé sur les animaux">Pas testé sur les animaux</option>
                <option value="Recommandé par un influenceur">Recommandé par un influenceur</option>
            </select>
            <button onclick="filterProducts()">Filtrer</button>
        </form>
        
    </section>
    <!-- FIN DE LA SECTIONS DES FILTRES -->

<!-- CONTENEUR DE PRODUITS -->
<!-- CONTENEUR DE PRODUITS -->
<div class="container">
    <?php
    // Inclure le fichier de connexion
    include 'connexion2.php';

    // Initialisation des variables de filtrage à partir des paramètres GET
    $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';
    $type_produit = isset($_GET['type-produit']) ? $_GET['type-produit'] : '';
    $preoccupation = isset($_GET['preoccupation']) ? $_GET['preoccupation'] : '';
    $twist = isset($_GET['twist']) ? $_GET['twist'] : '';

    // Protection contre les injections SQL
    $categorie = $conn->real_escape_string($categorie);
    $type_produit = $conn->real_escape_string($type_produit);
    $preoccupation = $conn->real_escape_string($preoccupation);
    $twist = $conn->real_escape_string($twist);

   
// Fonction pour afficher les produits avec jusqu'à trois boîtes
function afficherProduits($products) {
    // Affichage de la première boîte
    if (isset($products[0])) {
        echo '<div class="box" id="box1">';
        echo '<div class="box-title">Box 1 <button onclick="expandBox(1)">Agrandir</button></div>';
        echo '<div class="sub-box" id="subBox1">';
        echo '<h3>' . $products[0]["COL 1"] . '</h3>';
        echo '<img src="' . $products[0]["COL 11"] . '" class="product-image" onclick="openModal(0)">';
        echo '<div class="product-info">';
        echo '<p><span class="product-price">' . $products[0]["COL 7"] . '</span> EUR</p>';
        echo '<p><strong>Marque:</strong> ' . $products[0]["COL 2"] . '</p>';
        echo '<p><strong>Type de produit:</strong> ' . $products[0]["COL 3"] . '</p>';
        echo '<p><strong>Produit:</strong> ' . $products[0]["COL 4"] . '</p>';
        echo '<p><strong>Préoccupation:</strong> ' . $products[0]["COL 5"] . '</p>';
        echo '<p><strong>Twist:</strong> ' . $products[0]["COL 6"] . '</p>';
        echo '<p class="product-description">' . truncateDescription($products[0]["COL 10"], 60) . '</p>'; // Description raccourcie
        echo '<p><strong>Avis:</strong> ' . $products[0]["COL 8"] . '</p>';
        echo '<p><strong>Influenceur:</strong> ' . $products[0]["COL 9"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // Affichage de la deuxième boîte
    if (isset($products[1])) {
        echo '<div class="box" id="box2">';
        echo '<div class="box-title">Box 2 <button onclick="expandBox(2)">Agrandir</button></div>';
        echo '<div class="sub-box" id="subBox2">';
        echo '<h3>' . $products[1]["COL 1"] . '</h3>';
        echo '<img src="' . $products[1]["COL 11"] . '" class="product-image" onclick="openModal(1)">';
        echo '<div class="product-info">';
        echo '<p><span class="product-price">' . $products[1]["COL 7"] . '</span> EUR</p>';
        echo '<p><strong>Marque:</strong> ' . $products[1]["COL 2"] . '</p>';
        echo '<p><strong>Type de produit:</strong> ' . $products[1]["COL 3"] . '</p>';
        echo '<p><strong>Produit:</strong> ' . $products[1]["COL 4"] . '</p>';
        echo '<p><strong>Préoccupation:</strong> ' . $products[1]["COL 5"] . '</p>';
        echo '<p><strong>Twist:</strong> ' . $products[1]["COL 6"] . '</p>';
        echo '<p class="product-description">' . truncateDescription($products[1]["COL 10"], 60) . '</p>'; // Description raccourcie
        echo '<p><strong>Avis:</strong> ' . $products[1]["COL 8"] . '</p>';
        echo '<p><strong>Influenceur:</strong> ' . $products[1]["COL 9"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // Affichage de la troisième boîte avec contenu scrollable
    echo '<div class="box scrollable" id="box3">';
    $subCounter = 1;
    foreach ($products as $index => $product) {
        echo '<div class="sub-box" id="subBox' . ($subCounter + 2) . '">';
        echo '<h3>' . $product["COL 1"] . '</h3>';
        echo '<img src="' . $product["COL 11"] . '" class="product-image" onclick="openModal(' . $index . ')">';
        echo '<div class="product-info">';
        echo '<p><span class="product-price">' . $product["COL 7"] . '</span> EUR</p>';
        echo '<p><strong>Marque:</strong> ' . $product["COL 2"] . '</p>';
        echo '<p><strong>Type de produit:</strong> ' . $product["COL 3"] . '</p>';
        echo '<p><strong>Produit:</strong> ' . $product["COL 4"] . '</p>';
        echo '<p><strong>Préoccupation:</strong> ' . $product["COL 5"] . '</p>';
        echo '<p><strong>Twist:</strong> ' . $product["COL 6"] . '</p>';
        echo '<p class="product-description">' . truncateDescription($product["COL 10"], 60) . '</p>'; // Description raccourcie
        echo '<p><strong>Avis:</strong> ' . $product["COL 8"] . '</p>';
        echo '<p><strong>Influenceur:</strong> ' . $product["COL 9"] . '</p>';
        echo '<button class="replace-button" onclick="replaceContent(' . ($subCounter + 2) . ')">Remplacer</button>';
        echo '</div>';
        echo '</div>';
        $subCounter++;
    }
    echo '</div>';
}



// Fonction pour raccourcir la description
function truncateDescription($text, $max_length) {
    if (strlen($text) > $max_length) {
        $text = substr($text, 0, $max_length) . '... <button class="read-more" onclick="openFullDescription(this)">Voir plus</button>';
    }
    return $text;
}

    
    // Requête SQL pour sélectionner tous les produits en fonction des filtres
    $sql = "SELECT `COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11` FROM `produits` WHERE 1";

    if ($categorie !== '') {
        $sql .= " AND `COL 3` = '$categorie'";
    }

    if ($type_produit !== '') {
        $sql .= " AND `COL 4` = '$type_produit'";
    }

    if ($preoccupation !== '') {
        $sql .= " AND `COL 5` LIKE '%$preoccupation%'";
    }

    if ($twist !== '') {
        $sql .= " AND `COL 6` = '$twist'";
    }

    // Exécuter la requête SQL
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        // Afficher les produits
        afficherProduits($products);
    } else {
        echo "Aucun produit trouvé.";
    }

    // Fermeture de la connexion
    $conn->close();
    ?>
</div>

<!-- MODALE POUR LES DETAILS DU PRODUIT -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>
<!-- FIN DE LA MODALE -->

<!-- Fichiers JavaScript à inclure -->
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript pour gérer l'ouverture et la fermeture de la modale -->
<script>
    // Fonction pour ouvrir la modale avec les détails du produit
    function openModal(index) {
        var modal = document.getElementById("myModal");
        var modalContent = document.getElementById("modalContent");

        if (modal && modalContent) {
            var produits = <?php echo json_encode($products); ?>;
            var produit = produits[index];

            modalContent.innerHTML = `
                <h2>${produit["COL 1"]}</h2>
                <img src="${produit["COL 11"]}" alt="${produit["COL 1"]}">
                <p>Marque: ${produit["COL 2"]}</p>
                <p>Prix: ${produit["COL 7"]} EUR</p>
                <p>Description: ${produit["COL 4"]}</p>
                <p>Avis: ${produit["COL 8"]}</p>
                <p>Influenceurs: ${produit["COL 10"]}</p>
                <button onclick="window.open('${produit["siteurl"]}', '_blank')">Acheter</button>
            `;

            modal.style.display = "block";
        }
    }

    // JavaScript pour fermer la modale
    var closeBtn = document.querySelector(".close");
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            var modal = document.getElementById("myModal");
            if (modal) {
                modal.style.display = "none";
            }
        });
    }

    window.addEventListener('click', function(event) {
        var modal = document.getElementById("myModal");
        if (modal && event.target === modal) {
            modal.style.display = "none";
        }
    });
</body>

</html>
