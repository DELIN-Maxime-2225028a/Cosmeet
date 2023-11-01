<?php
require_once 'Modele/Ajout_publicationModels.php';
class ControleurAjout_publication {
    public function defautAction() {
        $this->addPublicationAction();
    }

    public function addPublicationAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $message = $_POST['message'];
            $categorie = $_POST['categorie'];
    
            $model = new Ajout_PublicationModels();
            $model->addPublication($titre, $message, $categorie);
    
            header('Location: index.php?url=Accueil');
        } else {
            Vue::montrer("Ajout_publication");
        }
    }
}