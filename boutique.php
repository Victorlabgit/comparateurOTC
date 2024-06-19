<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique de Marques</title>
    <video autoplay muted loop id="bg-video">
    <source src="backgroundvideo.mp4" type="video/mp4">
    <link rel="stylesheet" href="styles.css">

</video>
    <style>
        /* Styles pour la mise en forme des boîtes des marques */
        .brand-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            max-height: 400px; /* Limite la hauteur de chaque boîte de marque */
            overflow-y: auto; /* Ajoute une barre de défilement verticale si nécessaire */
            cursor: pointer; /* Ajoute un curseur de pointeur pour indiquer que la boîte est cliquable */
        }
        .brand-box img {
            max-width: 150px;
            max-height: 150px;
            width: auto;
            height: auto;
        }
        header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff2d;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
        
        #bg-video {
          position: fixed;
          top: 0;
          left: 0;
          min-width: 100%;
          min-height: 100%;
           width: 70%;
           height: 70%;
           z-index: -1;
        }
        .brands-container {
            display: flex;
            flex-wrap: wrap;
            
        }
        .product-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            text-align: center;
        }

        /* Styles pour la fenêtre modale */
        .modal {
            display: none; /* Masqué par défaut */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-height: 70%;
            overflow-y: auto;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <header> 

<nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="pre-index.php">Mon Diagnostique IA</a></li>
            <li><a href="boutique.php">Boutique</a></li>
            <li><a href="à propos.php">À Propos</a></li>
        </ul>
    </nav>
<body>

    <h1>Nos Marques</h1>
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
    </header>    
    </head> 
    <div class="brands-container">
        <?php
        // Liste des marques à afficher
        $marques = [
            'Aderma', 'Algologie', 'SVR', 'Avène', 'La Roche-Posay',
             'La Mer', 'CeraVe', 'Dr Renaud', 'La Provençale',
            'Lierac', 'Luxéol', 'Nuxe', 'Oenobiol', 'Neutrogena'
        ];

        // Inclure le fichier de connexion à la base de données
        include 'connexion2.php';

        // Parcourir les marques et afficher chaque boîte
        foreach ($marques as $marque) {
            echo '<div class="brand-box" onclick="openModal(\'' . $marque . '\')">';
            echo '<h2>' . $marque . '</h2>';

            // Requête SQL pour récupérer les produits de la marque actuelle
            $sql = "SELECT `COL 11` AS image, `COL 2` AS nom_produit FROM `produits` WHERE `COL 2` = '$marque'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-box">';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["nom_produit"] . '">';
                    echo '<p>' . $row["nom_produit"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Aucun produit disponible</p>';
            }

            echo '</div>';
        }

        // Fermeture de la connexion
        $conn->close();
        ?>
    </div>

</body>
</html>
