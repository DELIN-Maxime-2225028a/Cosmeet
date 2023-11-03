<?php
require_once 'Modele/AccueilModels.php';
final class ControleurAccueil
{
    public function defautAction() {
        $this->accueil();
    }

    public function getPublicationsAction() {
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 3;
        $model = new AccueilModels();
        $publications = $model->getPublications2($start, $nombre);
        $commentaires = $model->getCommentaires();
        
        $_SESSION['afficherGabarit'] = false;
        foreach ($publications as $publication) {
            Vue::montrer('Publication', array('publication' => $publication,'commentaires' => $commentaires));
        }
    }

    public function getCategorieAction() {
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 5;
        $model = new AccueilModels();
        $categories = $model->getCategories2($start, $nombre);
        
        $_SESSION['afficherGabarit'] = false;
        foreach ($categories as $categorie) {
            Vue::montrer('Categorie', array('categorie' => $categorie));
        }
    }

    public function accueil() {
        $model = new AccueilModels();
        $categories = $model->getCategories();
        $model->modifierDerniereConnection();
        if (isset($_SESSION['utilisateur'])) {
            Vue::montrer('Accueil/vue', array('categories' => $categories));
        } else {
            Vue::montrer('Inscription');
        }
    }
    
}