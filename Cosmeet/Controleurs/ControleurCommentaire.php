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
            $email = $_SESSION['utilisateur']['email'];
            if ($model->compteExiste($email)) {
                $model->addCommentaire($commentaire, $id_publication);
                header('Location: index.php?url=Accueil');
            } else {
                // Rediriger l'utilisateur vers la page de connexion
                header('Location: index.php?url=Connexion');
            }
        } else {
            Vue::montrer("Commentaire");
        }
    }

    public function getPseudo($email){
        $model = new CommentaireModels();
        $pseudo = $model->getPseudo($email);
        return $pseudo;
    }
}