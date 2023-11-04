document.addEventListener('DOMContentLoaded', function() {
    AfficherPlusPublications();
    AfficherPlusCategories();
    addToggleCommentsHandlers();
});

// Index initial pour suivre le nombre de publications déjà affichées
let currentIndexPost = -3;
let currentIndexCat = -5;

function addToggleCommentsHandlers() {
    document.querySelectorAll('.toggle-comments-button').forEach(function(button) {
        // Supprimez d'abord tous les écouteurs d'événements précédents pour éviter les doublons
        button.removeEventListener('click', toggleComments);
        // Ajoutez ensuite le nouvel écouteur d'événements
        button.addEventListener('click', toggleComments);
    });
}

// Déplacez la logique de basculement des commentaires dans une fonction séparée
function toggleComments() {
    var commentaires = this.nextElementSibling;
    if (commentaires.style.display == 'none') {
        commentaires.style.display = 'block';
    } else {
        commentaires.style.display = 'none';
    }
}


function AfficherPosts(nombre) {
    // Utilisez AJAX pour charger un nombre spécifique de publications
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?url=Accueil/getPublications&start=' + currentIndexPost + '&nombre=' + nombre, true);

    xhr.onload = function() {
        if(this.status === 200) {
            // Si le retour est succès, ajoutez le contenu à votre div publications
            const publicationsDiv = document.getElementById('publications');
            publicationsDiv.innerHTML += this.responseText;
            addToggleCommentsHandlers();
        }
        if(this.responseText.trim() === "") {
            document.getElementById('Afficher_plus_publications').style.display = 'none';
            document.getElementById('Afficher_moins_publications').style.display = 'block';
        } else if (currentIndexPost <= 0) {
            document.getElementById('Afficher_moins_publications').style.display = 'none';
            document.getElementById('Afficher_plus_publications').style.display = 'block';
        }
    }
    xhr.send();
}

function AfficherCategories(nombre) {
    // Utilisez AJAX pour charger un nombre spécifique de catégories
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?url=Accueil/getCategorie&start=' + currentIndexCat + '&nombre=' + nombre, true);

    xhr.onload = function() {
        if(this.status === 200) {
            // Si le retour est succès, ajoutez le contenu à votre div categories
            const publicationsDiv = document.getElementById('categories');
            publicationsDiv.innerHTML += this.responseText;

            if(this.responseText.trim() === "") {
                document.getElementById('Afficher_plus_categories').style.display = 'none';
                document.getElementById('Afficher_moins_categories').style.display = 'block';
            } else if (currentIndexCat <= 0) {
                document.getElementById('Afficher_moins_categories').style.display = 'none';
                document.getElementById('Afficher_plus_categories').style.display = 'block';
            }

        }
    }
    xhr.send();
}

function AfficherPlusPublications() {
    // Incrémentez l'index
    currentIndexPost += 5;

    // Rechargez les publications
    AfficherPosts(5);
}

function AfficherPlusCategories() {
    // Incrémentez l'index
    currentIndexCat += 5;

    // Rechargez les catégories
    AfficherCategories(5);
}

function AfficherMoinsPublications() {
    currentIndexPost = 0;

    document.getElementById('publications').innerHTML = '';

    // Recharge les publications
    AfficherPosts(5);
}

// Définissez les fonctions avant de les utiliser dans les gestionnaires d'événements
function AfficherMoinsCategories() {
    currentIndexCat = 0;

    document.getElementById('categories').innerHTML = '';

    // Recharge les catégories
    AfficherCategories(5);
}

document.getElementById('Afficher_plus_categories').addEventListener('click', AfficherPlusCategories);
document.getElementById('Afficher_plus_publications').addEventListener('click', AfficherPlusPublications);
document.getElementById('Afficher_moins_categories').addEventListener('click', AfficherMoinsCategories);
document.getElementById('Afficher_moins_publications').addEventListener('click', AfficherMoinsPublications);


document.getElementById('searchButton').addEventListener('click', function() {
    var recherche = document.getElementById('search').value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?url=Accueil/lancerRecherche&recherche=' + recherche, true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Ici, nous vidons tout le contenu de la page.
            document.body.innerHTML = '';

            // Ensuite, nous créons une nouvelle div pour les publications et nous y insérons les nouvelles publications.
            var publicationsDiv = document.createElement('div');
            publicationsDiv.id = 'publications';
            publicationsDiv.innerHTML = this.responseText;
            document.body.appendChild(publicationsDiv);

            setTimeout(addToggleCommentsHandlers, 100);
        }
    };
    xhr.send();
});