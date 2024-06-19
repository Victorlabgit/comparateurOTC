<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - Notre Service</title>
    
</head>
<style> /* Styles spécifiques pour la page "À propos" */
body {
  font-family: Arial, sans-serif;
  background-color:  #f5f5f5; /* Couleur de fond terre battue */
  color: #ffffff; /* Couleur du texte */
}
/* CONNEXION UTILISATEUR */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff2d;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

h1 {
    margin: 0;
    font-size: 1.5em;
    color: #000;
}

.form-container {
    display: none;
    padding: 10px;
    background-color: rgba(250, 250, 250, 0.9);
    border-radius: 8px;
}

.form-container h3 {
    color: #423730;
}

.form-container form {
    display: flex;
    flex-direction: column;
}

.form-container label {
    margin-bottom: 5px;
}

.form-container input {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.form-container button {
    padding: 10px;
    background-color: #1a6958;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #144c3f;
}
.modal {
    display: none; /* Par défaut, la modal est cachée */
    /* Autres styles */
}

.form-container {
    display: none;
}

.form-container.active {
    display: block;
}

.user-info {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.user-info span {
    margin-right: 10px;
}
header {

  text-align: center;

}
nav ul {
    list-style-type: none; /* Suppression des puces de la liste */
    padding: 0;
  }
  
  nav ul li {
    display: inline; /* Affichage en ligne des éléments de la liste */
    margin: 0 15px; /* Espacement entre les éléments de la liste */
    align-items: center;
  }
    .container {
        max-width: 800px;
        margin: auto;
        padding: 0 20px;
    }
    
    .about-section {
        background-color: rgba(16, 30, 49, 0.8);
        padding: 40px;
        border-radius: 15px;
        color: #fff;
        margin-bottom: 20px;
    }
    
    .about-section h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }
    
    .about-section p {
        margin-bottom: 15px;
    }
    
    .about-section ul {
        list-style-type: disc;
        margin-left: 20px;
        margin-bottom: 15px;
    }
    
    .about-section ul li {
        margin-bottom: 5px;
        display: inline
    }
    
    .about-section .highlight {
        font-weight: bold;
        color: #ff9696;
    }
    
    .about-section .italic {
        font-style: italic;
    }
    
    .footer {
        text-align: center;
        margin-top: 20px;
        color: #000000;
    }
    
    /* Media query pour ajuster le contenu sur les petits écrans */
    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }
    
        .about-section {
            padding: 20px;
        }
    }
    #bg-video {
    position: fixed; /* Positionnement fixe pour la vidéo de fond */
    top: 0;
    left: 0;
    min-width: 100%; /* Largeur minimale de 100% */
    min-height: 100%; /* Hauteur minimale de 100% */
    width: 70%; /* Largeur de 70% */
    height: 70%; /* Hauteur de 70% */
    z-index: -1; /* Assurez-vous que la vidéo est placée en arrière-plan */
  }
  label {
    color: #423730; /* Choisissez la couleur que vous préférez */
}
    </style>
    
    <body>
    <!-- Balise video pour la vidéo d'arrière-plan -->
    <video autoplay muted loop id="bg-video">
        <source src="backgroundvideo.mp4" type="video/mp4">
        
  </video>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="pre-index.php">Mon Diagnostique IA</a></li>
            <li><a href="boutique.php">Boutique</a></li>
            <li><a href="à propos.php">À Propos</a></li>
        </ul>
    </nav>
       <!-- CONNEXION -->

       <div class="container">
        <aside class="sidebar">
            <h2>Espace utilisateur</h2>
            <div id="userPanel">
                <button onclick="toggleLoginForm()">Se connecter</button>
                <button onclick="toggleRegistrationForm()">S'inscrire</button>
            </div>   

            <?php

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
</header>    

    <div class="container">
        <header>
            <h1>À propos de Notre Service</h1>
        </header>
        <main>
            <section>
                <h2>Notre Philosophie</h2>
                <p>
                    Rendre la parapharmacie transparente, pratique et accessible à tous.
                    Comparez les prix et les formulations des produits en toute confiance.
                    Rejoignez-nous pour une expérience de bien-être sur mesure, qui vous convient parfaitement.
                </p>
            </section>
            <section>
                <h2>Notre Service</h2>
                <p>
                    Comparer tous les produits OTC du marché. Nous référençons toutes les cures, routines,
                    pour le corps, le visage, les cheveux ou encore les ongles qui sont disponibles en libre accès
                    et nous les comparons. Des produits dermo-cosmétiques, des dispositifs médicaux, des compléments alimentaires.
                </p>
                <p>
                    Nous analysons chaque produit en détail pour vous fournir des informations fiables et des comparaisons claires.
                    Notre interface conviviale facilite la recherche et la prise de décision.
                    Consultez les avis des utilisateurs pour des perspectives supplémentaires, découvrez les influenceurs qui les utilisent
                    et surtout trouvez les produits qui vous conviennent !
                </p>
            </section>
        </main>
        <footer>
            <p>© 2024 OTC Compare. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
