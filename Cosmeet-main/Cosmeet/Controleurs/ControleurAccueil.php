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

    public function getPublications() {
        $publications = new AccueilModels();
        return $publications->getPublications();
    }
    public function accueil() {
        $publications = $this->getPublications();
        if (isset($_SESSION['utilisateur'])) {
            Vue::montrer('Accueil/vue', array('publications' => $publications));
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