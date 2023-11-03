<?php
use FTP\Connection;
require_once 'Modele/CompteModels.php';

class ControleurCompte {

    public function defautAction() {
        if (isset($_GET['pseudo'])) {
            $pseudo = $_GET['pseudo'];
    
            $model = new CompteModels();
            $email = $model->getEmail($pseudo);
            $DateInscription = $model->getDateInscription($pseudo);
            $DateConnexion = $model->getDateConnexion($pseudo);
    
            Vue::montrer("Compte", array('pseudo'=>$pseudo,'email'=>$email,'DateInscription'=>$DateInscription,'DateConnexion'=>$DateConnexion));
        } else {
            Vue::montrer("Utilisateur");
        }
    }
    
}


