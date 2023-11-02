<?php
use FTP\Connection;
require_once 'Modele/ConnexionModels.php';

class ControleurConnexion {
    public function defautAction() {
        Vue::montrer("Connexion");
    }

    public function verifierUtilisateurAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'] ?? '';
        $mdp1 = $A_postParams['mdp1'] ?? '';

        $O_connexion = new ConnexionModels();
        if ($O_connexion->pseudonymeExiste($pseudo)){
            if ($O_connexion->verifierUtilisateur($pseudo,$mdp1)) {
                $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email' =>$O_connexion->getEmail($pseudo),
                        'mdp1' => $mdp1,
                        "date_inscription" => $O_connexion -> getDateInscription($pseudo),
                        "date_derniere_connexion" => date('y-m-d H:i:s')
                    );
                    header('Location: ../Cosmeet/index.php?url=Accueil');
                    exit();
                }
                else{
                    Vue::montrer("Connexion", array('erreur'=>'mot de passe mauvais'));
                }
            }
            else{
                Vue::montrer("Connexion", array('erreur' => 'pseudonyme existe pas'));
            }
        } 
    }
?>
