<?php
require_once 'Modele/AccueilModels.php';
final class ControleurAccueil
{
    public function defautAction() {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'Inscription':
                    $this->inscription();
                    break;
                case 'Connexion':
                    $this->connexion();
                    break;
                default:
                    $this->accueil();
                    break;
            }
        } else {
            $this->accueil();
        }
    }

    public function publicationsParCategorie($categorie) {
        $model = new AccueilModels();
        $publications = $model->getPublicationsByCategorie($categorie);
        Vue::montrer('Accueil/vue', array('publications' => $publications));
    }

    public function accueil() {
        $model = new AccueilModels();
        $categories = $model->getAllCategories();
        $publications = $model->getPublications();
        $commentaires = $model->getCommentaires();
        $model->modifierDerniereConnection();
        if (isset($_SESSION['utilisateur'])) {
            Vue::montrer('Accueil/vue', array('publications' => $publications,'commentaires' => $commentaires, 'categories' => $categories));
        } else {
            Vue::montrer('Inscription');
        }
    }

    public function inscription() {
        Vue::montrer('Inscription/vue');
    }

    public function connexion() {
        Vue::montrer('Connexion/vue');
    }
    
}