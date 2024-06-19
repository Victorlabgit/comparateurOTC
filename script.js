// COMPARATEUR
// Liste des options pour chaque catégorie
var optionsProduits = {
    "Type de Produits": [
        "Mon Visage", "Mon Corps", "Mes Cheveux", "Bien-Être"
    ],
    "Mon Visage": [
        "Sérum visage", "Crème visage", "Lotion visage", "Spray / Brume visage", 
        "Nettoyant / Démaquillant visage", "Masque visage", "Gommage visage", 
        "Huile visage", "Teinté visage", "Nuit visage", "Jour visage", 
        "Yeux visage", "Lèvres visage"
    ],
    "Mon Corps": [
        "Soins de douche", "Crèmes et gommages corps", "Soins mains et ongles", 
        "Gommages corps", "Soins solaires corps et autobronzant", "Huile corps", 
        "Hygiène corporelle", "Roll-on"
    ],
    "Mes Cheveux": [
        "Soins cheveux et cuir chevelu", "Shampoings activés", "Masques et démêlants", 
        "Soins barbe", "Pousses & repousses", "Routine"
    ],
    "Bien-Être": [
        "Huiles essentielles", "Phytothérapie", "Complément alimentaire", 
        "Lithothérapie", "Sport"
    ]
};

var optionsPreoccupations = {
    "Mon Visage": [
        "Rides & perte de fermeté", "Points noirs & pores dilatés", "Teint terne", 
        "Tâches pigmentaires, marques", "Hyperpigmentation post-inflammatoire", 
        "Peau brillante", "Boutons/acnée", "Peau sèche & déshydratée", 
        "Sécheresse cutanée", "Cernes & poches", "Glow"
    ],
    "Mon Corps": [
        "Sécheresse cutanée", "Poils incarnés", "Vergetures / Minceur", "Bronzage", 
        "Hygiène intime", "Transpiration", "Peau douce", "Anti-âge"
    ],
    "Mes Cheveux": [
        "Cheveux secs", "Cheveux fourchus/abîmés", "Pellicules", "Démangeaisons", 
        "Cuir chevelu gras", "Psioriasis", "Cheveux bouclés", "Brillance", 
        "Perte de cheveux"
    ],
    "Bien-Être": [
        "Stress et anxiété", "Trouble du sommeil", "Vitamines & énergie", 
        "Inconfort urinaire", "Règles douloureuses", "Articulations & muscles"
    ]
};

var optionsTwist = {
    "Mon Visage": [
        "Bio", "Made in France", "Good for the planet", "Naturalité", 
        "Noté sur Yuka", "Vegan", "Gluten free", "Slow cosmétique", 
        "Pas testé sur les animaux", "Recommandé par un influenceur"
    ],
    "Mon Corps": [
        "Bio", "Made in France", "Good for the planet", "Naturalité", 
        "Noté sur Yuka", "Vegan", "Gluten free", "Slow cosmétique", 
        "Pas testé sur les animaux", "Recommandé par un influenceur"
    ],
    "Mes Cheveux": [
        "Bio", "Made in France", "Good for the planet", "Naturalité", 
        "Noté sur Yuka", "Vegan", "Gluten free", "Slow cosmétique", 
        "Pas testé sur les animaux", "Recommandé par un influenceur"
    ],
    "Bien-Être": [
        "Bio", "Made in France", "Good for the planet", "Naturalité", 
        "Noté sur Yuka", "Vegan", "Gluten free", "Slow cosmétique", 
        "Pas testé sur les animaux", "Recommandé par un influenceur"
    ]
};

// Fonction pour remplir les options d'un menu déroulant
function fillDropdown(selectId, options) {
    var selectElement = document.getElementById(selectId);
    if (selectElement) {
        // Effacer les options actuelles
        selectElement.innerHTML = '';

        // Ajouter une option "Tous les [nom du menu déroulant]"
        var allOption = document.createElement('option');
        allOption.value = 'all'; // Valeur spécifique pour "Tous les ..."
        allOption.textContent = 'Tous les ' + selectId.charAt(0).toUpperCase() + selectId.slice(1); // Met à jour le texte par défaut
        selectElement.appendChild(allOption);

        // Ajouter les options du tableau
        if (options) {
            options.forEach(function(option) {
                var optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                selectElement.appendChild(optionElement);
            });
        }
    }
}

// Fonction pour remplir les options d'un menu déroulant en fonction de la catégorie sélectionnée
function updateDropdowns() {
    var categorie = document.getElementById('partie-du-corps').value;

    // Ici, vous pouvez utiliser la valeur de 'categorie' pour filtrer ou agir en conséquence
    console.log('Catégorie sélectionnée:', categorie);
    console.log('Sélection mise à jour');
    // Réinitialiser les menus déroulants avant de les remplir
    fillDropdown('produit', []);
    fillDropdown('preoccupation', []);
    fillDropdown('twist', []);


    var categorie = document.getElementById('partie-du-corps').value;

    // Remplir le menu déroulant Partie du corps
    fillDropdown('partie-du-corps', optionsProduits["Type de Produits"]);

    // Remplir le menu déroulant Produit
    fillDropdown('produit', optionsProduits[categorie]);

    // Remplir le menu déroulant Préoccupation
    fillDropdown('preoccupation', optionsPreoccupations[categorie]);

    // Remplir le menu déroulant Twist
    fillDropdown('twist', optionsTwist[categorie]);
}

// Fonction pour filtrer les produits
function filterProducts() {
    var categorie = document.getElementById('partie-du-corps').value;
    var typeProduit = document.getElementById('produit').value;
    var preoccupation = document.getElementById('preoccupation').value;
    var twist = document.getElementById('twist').value;
    // Ajoutez ici le code pour filtrer les produits en fonction des sélections

    // Ajoutez ici le code pour filtrer les produits en fonction des sélections

    // Construire l'URL de requête avec les paramètres de filtre
    var url = 'filtre-produits.php?';
    if (categorie !== '') {
        url += 'categorie=' + encodeURIComponent(categorie) + '&';
    }
    if (typeProduit !== 'all' && typeProduit !== '') {
        url += 'type-produit=' + encodeURIComponent(typeProduit) + '&';
    }
    if (preoccupation !== 'all' && preoccupation !== '') {
        url += 'preoccupation=' + encodeURIComponent(preoccupation) + '&';
    }
    if (twist !== 'all' && twist !== '') {
        url += 'twist=' + encodeURIComponent(twist);
    }

    // Envoyer une requête AJAX avec les données via XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            var produits = JSON.parse(xhr.responseText); // Convertir la réponse JSON en objet JavaScript

            // Mettre à jour dynamiquement le contenu HTML des boîtes avec les produits filtrés
            updateProductBoxes(produits);
        } else {
            console.error('Erreur lors de la requête AJAX');
        }
    };

    xhr.send();
}

function filtrerParCategorie(categorie) {
    var subdivisionsContainer = document.getElementById('box3');
    var subdivisions = subdivisionsContainer.getElementsByClassName('subdivision');

    for (var i = 0; i < subdivisions.length; i++) {
        var subdivision = subdivisions[i];
        var produitCategorie = subdivision.dataset.categorie;

        if (produitCategorie !== categorie) {
            subdivision.style.display = 'none'; // Masque la subdivision si elle n'appartient pas à la catégorie sélectionnée
        } else {
            subdivision.style.display = 'block'; // Affiche la subdivision si elle appartient à la catégorie sélectionnée
        }
    }
}

// Fonction pour mettre à jour dynamiquement le contenu des boîtes de produits
function updateProductBoxes(produits) {
    // Exemple : Mettre à jour les boîtes de produits dans votre interface
    console.log('Produits filtrés :');
    console.log(produits);
}

// Fonction pour réinitialiser les boîtes lorsque l'utilisateur clique en dehors d'une boîte
document.addEventListener('click', function(event) {
    if (!event.target.closest('.box')) {
        document.querySelectorAll('.box').forEach(box => {
            box.classList.remove('expanded', 'expanded-box3');
            box.style.width = '30%';
        });
        document.getElementById('box3').style.maxHeight = '650px'; // Réinitialiser la hauteur maximale
    }
});
 

    // Fonction pour agrandir une boîte spécifique
    function expandBox(boxNum) {
        // Réinitialiser toutes les boîtes à leur état initial
        document.querySelectorAll('.box').forEach(box => {
            box.classList.remove('expanded', 'expanded-box3');
            box.style.width = '30%';
        });

        // Agrandir la boîte sélectionnée et la box 3
        document.getElementById('box' + boxNum).classList.add('expanded');
        document.getElementById('box3').classList.add('expanded', 'expanded-box3');

        // Calculer la hauteur maximale pour la scroll box 3
        let boxHeight = document.getElementById('box' + boxNum).offsetHeight;
        let maxHeight = boxHeight + 150; // Ajouter une marge supplémentaire si nécessaire

        document.getElementById('box3').style.maxHeight = maxHeight + 'px';

        // Réduire l'autre boîte
        if (boxNum == 1) {
            document.getElementById('box2').style.width = '10%';
        } else if (boxNum == 2) {
            document.getElementById('box1').style.width = '10%';
        }
    }

  
    function replaceContent(subBoxNum) {
        // Récupérer le contenu de la sous-box
        let subBoxContent = document.getElementById('subBox' + subBoxNum).innerHTML;

        // Récupérer la boîte réduite
        let reducedBox = document.querySelector('.box:not(.expanded)');

        // Remplacer le contenu de la boîte réduite par le contenu de la sous-box
        reducedBox.querySelector('.sub-box').innerHTML = subBoxContent;

        // Réinitialiser la boîte réduite
        reducedBox.classList.remove('expanded');
        reducedBox.style.width = '30%';

        // Réinitialiser la hauteur maximale de la box 3
        document.getElementById('box3').style.maxHeight = '350px';
        document.getElementById('box3').classList.remove('expanded', 'expanded-box3');

        // Vérifier si le produit a été déplacé vers box1 ou box2
        if (document.getElementById('box1').contains(document.getElementById('subBox' + subBoxNum)) ||
            document.getElementById('box2').contains(document.getElementById('subBox' + subBoxNum))) {
            // Si oui, faire disparaître le bouton Remplacer correspondant
            document.getElementById('subBox' + subBoxNum).querySelector('.replace-button').style.display = 'none';
        }
    }

    // FIN COMPARATEUR

    // CONNEXION UTILISATEUR 

   
// Fonction pour basculer le formulaire de connexion
function toggleLoginForm() {
    var loginForm = document.getElementById('loginForm');
    var registrationForm = document.getElementById('registrationForm');

    loginForm.style.display = 'block'; // Affiche le formulaire de connexion
    registrationForm.style.display = 'none'; // Cache le formulaire d'inscription
}

// Fonction pour basculer le formulaire d'inscription
function toggleRegistrationForm() {
    var loginForm = document.getElementById('loginForm');
    var registrationForm = document.getElementById('registrationForm');

    loginForm.style.display = 'none'; // Cache le formulaire de connexion
    registrationForm.style.display = 'block'; // Affiche le formulaire d'inscription
}

// Simulation de la fonction de connexion (à remplacer par une véritable logique backend)
function login(event) {
    event.preventDefault(); // Empêche le formulaire de soumettre normalement
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Ici, vous pouvez implémenter la logique de connexion
    console.log('Connexion avec', username, 'et', password);

    // Exemple : Redirection vers une autre page après la connexion réussie
    window.location.href = 'index.php';
}

// Simulation de la fonction d'inscription (à remplacer par une véritable logique backend)
function register(event) {
    event.preventDefault(); // Empêche le formulaire de soumettre normalement
    var newUsername = document.getElementById('newUsername').value;
    var newPassword = document.getElementById('newPassword').value;

    // Ici, vous pouvez implémenter la logique d'inscription
    console.log('Inscription avec', newUsername, 'et', newPassword);

    // Exemple : Affichage d'un message de succès ou autre logique après l'inscription
    alert('Inscription réussie pour ' + newUsername);

    // Réinitialisation du formulaire après inscription réussie (optionnel)
    document.getElementById('newUsername').value = '';
    document.getElementById('newPassword').value = '';
}

// JavaScript pour fermer la modal
function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Cache la fenêtre modale
}

// Événement pour fermer la modal lorsque l'utilisateur clique sur le bouton de fermeture
var closeButton = document.getElementsByClassName('close')[0];
if (closeButton) {
    closeButton.addEventListener('click', closeModal);
}

// Événement pour fermer la modal lorsque l'utilisateur clique en dehors de la modal
window.addEventListener('click', function(event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        closeModal();
    }
});
// script.js

function toggleLoginForm() {
    document.getElementById('loginForm').classList.toggle('active');
    document.getElementById('registrationForm').classList.remove('active');
}

function toggleRegistrationForm() {
    document.getElementById('registrationForm').classList.toggle('active');
    document.getElementById('loginForm').classList.remove('active');
}

// FIN CONNEXION UTILISATEUR 



// 