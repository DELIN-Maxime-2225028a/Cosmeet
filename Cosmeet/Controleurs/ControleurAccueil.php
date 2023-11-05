<?php

require_once 'Modele/AccueilModels.php';

final class ControleurAccueil
{
    // Fonction par défaut pour le contrôleur d'accueil.
    public function defautAction()
    {
        $this->accueil();
    }

    // Fonction pour obtenir et afficher les publications.
    public function getPublicationsAction()
    {
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 3;
        $model = new AccueilModels();
        $publications = $model->getPublicationsStart($start, $nombre);
        $commentaires = $model->getCommentaires();

        $_SESSION['afficherGabarit'] = false;
        foreach ($publications as $publication) {
            Vue::montrer('Publication', array('publication' => $publication, 'commentaires' => $commentaires));
        }
    }

    // Fonction pour obtenir et afficher les catégories.
    public function getCategorieAction()
    {
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 5;
        $model = new AccueilModels();
        $categories = $model->getCategoriesStart($start, $nombre);

        $_SESSION['afficherGabarit'] = false;
        foreach ($categories as $categorie) {
            Vue::montrer('Categorie', array('categorie' => $categorie));
        }
    }

    // Fonction pour effectuer une recherche et afficher les résultats.
    public function lancerRechercheAction()
    {
        $recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';
        $model = new AccueilModels();
        $publications = $model->getRecherche($recherche);
        $commentaires = $model->getCommentaires();

        $_SESSION['afficherGabarit'] = false;
        foreach ($publications as $publication) {
            Vue::montrer('Publication', array('publication' => $publication, 'commentaires' => $commentaires));
        }
    }

    public function ajouterCategorieAction()
{
    $nom_categorie = $_POST['nom_categorie'];
    $description_categorie = $_POST['description_categorie'];
    $model = new AccueilModels();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $model->ajouterCategorie($nom_categorie, $description_categorie);
        Vue::montrer('Accueil/vue');
    }
}

    // Fonction pour afficher la page d'accueil.
    public function accueil()
    {
        if (isset($_SESSION['utilisateur'])) {
            $model = new AccueilModels();
            $categories = $model->getCategories();
            $model->modifierDerniereConnection();
            Vue::montrer('Accueil/vue', array('categories' => $categories));
        } else {
            Vue::montrer("Connexion", array('erreur' => 'Vous n\'êtes pas connecté'));
        }
    }
}
