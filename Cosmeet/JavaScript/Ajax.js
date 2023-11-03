document.addEventListener('DOMContentLoaded', function() {
    AfficherPosts();
    addToggleCommentsHandlers();
    AfficherCategories();
});

// Index initial pour suivre le nombre de publications déjà affichées
let currentIndex = 0;

function addToggleCommentsHandlers() {
    document.querySelectorAll('.toggle-comments-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var commentaires = this.nextElementSibling;
            if (commentaires.style.display == 'none') {
                commentaires.style.display = 'block';
            } else {
                commentaires.style.display = 'none';
            }
        });
    });
}

function AfficherPosts() {
    // Utilisez AJAX pour charger les 3 publications suivantes
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?url=Accueil/getPublications&start=' + currentIndex, true);

    xhr.onload = function() {
        if(this.status === 200) {
            // Si le retour est succès, ajoutez le contenu à votre div publications
            const publicationsDiv = document.getElementById('publications');
            publicationsDiv.innerHTML += this.responseText;

            // Incrémentez l'index pour charger les prochains posts la prochaine fois
            currentIndex += 3;
            addToggleCommentsHandlers();

            // Optionnel: si aucune donnée n'est retournée, désactiver le bouton Load More
            if(this.responseText.trim() === "") {
                document.getElementById('Afficher_plus').style.display = 'none';
            }
        }
    }

    xhr.send();
}

function AfficherCategories() {
    // Utilisez AJAX pour charger les 3 publications suivantes
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?url=Accueil/getCategorie&start=' + currentIndex, true);

    xhr.onload = function() {
        if(this.status === 200) {
            // Si le retour est succès, ajoutez le contenu à votre div publications
            const publicationsDiv = document.getElementById('categorie');
            publicationsDiv.innerHTML += this.responseText;

            // Incrémentez l'index pour charger les prochains posts la prochaine fois
            currentIndex += 3;

            if(this.responseText.trim() === "") {
                document.getElementById('plus').style.display = 'none';
            }
        }
    }

    xhr.send();
}

