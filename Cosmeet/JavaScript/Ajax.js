// Index initial pour suivre le nombre de publications déjà affichées
let currentIndex = 5;

function AfficherPosts() {
    // Utilisez AJAX pour charger les 5 publications suivantes
    const xhr = new XMLHttpRequest();
    xhr.open('GET', ' =' + currentIndex, true);

    xhr.onload = function() {
        if(this.status === 200) {
            // Si le retour est succès, ajoutez le contenu à votre div publications
            const publicationsDiv = document.getElementById('publications');
            publicationsDiv.innerHTML += this.responseText;

            // Incrémentez l'index pour charger les prochains posts la prochaine fois
            currentIndex += 5;

            // Optionnel: si aucune donnée n'est retournée, désactiver le bouton Load More
            if(this.responseText.trim() === "") {
                document.getElementById('Afficher plus').style.display = 'none';
            }
        }
    }

    xhr.send();
}

