<?php
require_once 'Modele/CommentaireModels.php';

class ControleurCommentaire {
    public function defautAction() {
        $this->addCommentaireAction();
    }

    public function addCommentaireAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentaire = $_POST['commentaire'];
            $id_publication = $_POST['id_publication'];
            
            $model = new CommentaireModels();
            $model->addCommentaire($commentaire, $id_publication);
            
            header('Location: index.php?url=Accueil');
        } else {
            Vue::montrer("Commentaire");
        }
    }
}