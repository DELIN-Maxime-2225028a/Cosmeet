<?php

require_once 'Modele/MotDePasseOublierModels.php';
class ControleurMotDePasseOublier {
    public function defautAction(){
    }

    public function motDePasseOublierAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp1 = $A_postParams['mdp1'];
        $mdp2 = $A_postParams['mdp2'];

            $O_motDePasseOublier = new MotDePasseOublierModels();
                if ($pseudo != $O_motDePasseOublier ->getPseudo($email)) {
                    Vue::montrer("Utilisateur", array('erreur' => 'Pseudonyme et email ne se coresponde pas'));
                }
                elseif ($email != $O_motDePasseOublier ->getEmail($pseudo)) {
                    Vue::montrer("MotDePasseOublier", array('erreur' => 'Pseudonyme et email ne se coresponde pas'));
                }   
                elseif ($mdp1 != $mdp2) {
                    Vue::montrer("Utilisateur", array('erreur' => 'Mot de passe pas identique'));
                }
                else{
                    $O_motDePasseOublier -> modifiermdp($pseudo,$email,$mdp1);
                    Vue::montrer('MotDePasseOublier', array('reussite' => 'Modification prise en compte'));
                    $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email'=> $email,
                        'mdp1' => $mdp1,
                        "date_inscription" => $O_motDePasseOublier -> getDateinscription($pseudo),
                        "date_derniere_connexion" => date('y-m-d H:i:s')
                    );
                    header('Location: ./index.php?url=Utilisateur');
                    exit;
                }   
        }
    }
