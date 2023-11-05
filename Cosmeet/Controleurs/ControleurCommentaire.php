<?php

require_once 'Modele/CommentaireModels.php';

class ControleurCommentaire
{

    // Fonction par défaut qui redirige vers addCommentaire.
    public function defautAction()
    {
        $this->addCommentaireAction();
    }

    // Fonction qui gère l'ajout d'un commentaire.
    public function addCommentaireAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentaire = $_POST['commentaire'];
            $id_publication = $_POST['id_publication'];

            $model = new CommentaireModels();
            $email = $_SESSION['utilisateur']['email'];
            if ($model->compteExiste($email)) {
                $model->addCommentaire($commentaire, $id_publication);
                header('Location: index.php?url=Accueil');
            } else {
                header('Location: index.php?url=Connexion');
            }
        } else {
            Vue::montrer("Commentaire");
        }
    }

    // Fonction pour obtenir le pseudonyme d'un utilisateur.
    public function getPseudo($email)
    {
        $model = new CommentaireModels();
        $pseudo = $model->getPseudo($email);
        return $pseudo;
    }
}
