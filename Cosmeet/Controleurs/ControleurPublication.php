<?php
require_once 'Modele/PublicationModels.php';
class ControleurPublication {

    public function defautAction() {
        $this->addPublicationAction();
    }

    public function addPublicationAction() {
        $titre = $_POST['titre'];
        $message = $_POST['message'];
        $nom_categorie = $_POST['categorie']; 
        $O_ajoutpublication = new PublicationModels();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_SESSION['utilisateur']['email'];
            if ($O_ajoutpublication->compteExiste($email)) {
                $O_ajoutpublication->addPublication($titre, $message, $nom_categorie);
                header('Location: index.php?url=Accueil');
            } else {
                header('Location: index.php?url=Connexion');
            }
        }
    }
    
    public function getPseudo($email){
        $model = new PublicationModels();
        $pseudo = $model->getPseudo($email);
        return $pseudo;
    }
}
