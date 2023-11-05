<?php

use FTP\Connection;

require_once 'Modele/CompteModels.php';

class ControleurCompte
{
    // Fonction par défaut du contrôleur pour afficher le compte.
    public function defautAction()
    {
        if (isset($_GET['email'])) {
            $email = $_GET['email'];

            $model = new CompteModels();
            $pseudo = $model->getPseudo($email);
            $DateInscription = $model->getDateInscription($email);
            $DateConnexion = $model->getDateConnexion($email);

            Vue::montrer("Compte", array('pseudo' => $pseudo, 'email' => $email, 'DateInscription' => $DateInscription, 'DateConnexion' => $DateConnexion));
        } else {
            Vue::montrer("Utilisateur");
        }
    }
    
    // Fonction pour supprimer un compte.
    public function supprimerCompteAction($pseudo, $email)
    {
        $model = new CompteModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $postIds = $model->getPostIds($email);
            foreach ($postIds as $postId) {
                $model->supprimerCommentaires($postId);
            }
            $model->supprimerPosts($email);
            $model->supprimerCompte($pseudo);
            header('Location: index.php?url=Accueil');
        }
    }
}
