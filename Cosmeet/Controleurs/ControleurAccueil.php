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

    public function getPublicationsAction() {
        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $model = new AccueilModels();
        $publications = $model->getPublications2($start);
        $commentaires = $model->getCommentaires();
        
        $_SESSION['afficherGabarit'] = false;
        foreach ($publications as $publication) {
            Vue::montrer('Publication', array('publication' => $publication,'commentaires' => $commentaires));
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