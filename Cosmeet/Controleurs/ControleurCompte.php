<?php
use FTP\Connection;
require_once 'Modele/CompteModels.php';

class ControleurCompte {

    public function defautAction() {
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
    
            $model = new CompteModels();
            $pseudo = $model->getPseudo($email);
            $DateInscription = $model->getDateInscription($email);
            $DateConnexion = $model->getDateConnexion($email);
    
            Vue::montrer("Compte", array('pseudo'=>$pseudo,'email'=>$email,'DateInscription'=>$DateInscription,'DateConnexion'=>$DateConnexion));
        } else {
            Vue::montrer("Utilisateur");
        }
    }
    
}


