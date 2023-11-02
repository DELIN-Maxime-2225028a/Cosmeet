<?php
use FTP\Connection;
require_once 'Modele/CompteModels.php';

class ControleurCompte {

    public function defautAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['auteur'];

            $email = new CompteModels();
            $email->getEmail($pseudo);

            $DateInscription = new CompteModels();
            $DateInscription->getDateInscription($pseudo);

            $DateConnexion = new CompteModels();
            $DateConnexion->getDateConnexion($pseudo);

            Vue::montrer("Compte", array('pseudo'=>'mot','email'=>'mot','DateInscription'=>'mot','DateConnexion'=>'mot'));
        } else {
            Vue::montrer("Utilisateur");
        }
        
    }
    
}


