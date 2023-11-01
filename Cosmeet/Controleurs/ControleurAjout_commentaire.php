<?php
require_once 'Modele/Ajout_commentaireModels.php';

class ControleurAjout_commentaire {
    public function defautAction() {
        $this->addCommentaireAction();
    }

    public function addCommentaireAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentaire = $_POST['commentaire'];
            $id_publication = $_POST['id_publication'];
            
            $model = new Ajout_commentaireModels();
            $model->addCommentaire($commentaire, $id_publication);
            
            header('Location: index.php?url=Accueil');
        } else {
            Vue::montrer("Ajout_commentaire");
        }
    }
}