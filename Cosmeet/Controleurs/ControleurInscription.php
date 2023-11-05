<?php

use FTP\Connection;

require_once 'Modele/InscriptionModels.php';

class ControleurInscription
{
    public function defautAction()
    {
        Vue::montrer("Inscription");
    }

    // Fonction qui traite le formulaire d'inscription envoyé par l'utilisateur.
    public function traiterFormulaireAction(array $urlParameters, array $A_postParams = null)
    {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp1 = $A_postParams['mdp1'];
        $mdp2 = $A_postParams['mdp2'];

        $O_inscription = new InscriptionModels();
        if ($O_inscription->mdp1egalemdp2($mdp1, $mdp2)) {
            if ($O_inscription->emailUtiliser($email)) {
                Vue::montrer("Inscription", array('erreur' => 'Email deja utiliser'));
            } elseif ($O_inscription->pseudoUtilise($pseudo)) {
                Vue::montrer("Inscription", array('erreur' => 'Pseudonyme deja utiliser'));
            } else {
                $_SESSION['utilisateur'] = array(
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'mdp1' => $mdp1,
                    "date_inscription" => date('y-m-d H:i:s'),
                    "date_derniere_connexion" => date('y-m-d H:i:s'),
                    "user_type" => "utilisateur"
                );
                $O_inscription->inscription($pseudo, $email, $mdp1);
                header('Location: ./index.php?url=Accueil');
                exit();
            }
        } else {
            Vue::montrer("Inscription", array('erreur' => 'Mots de passe pas identique'));
        }
    }
}
