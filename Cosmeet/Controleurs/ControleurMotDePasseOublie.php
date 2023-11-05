<?php

require_once 'Modele/MotDePasseOublieModels.php';
class ControleurMotDePasseOublie {
    public function defautAction(){
        Vue::montrer("MotDePasseOublie");
    }

    public function MotDePasseOublieAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp1 = $A_postParams['mdp1'];
        $mdp2 = $A_postParams['mdp2'];

            $O_MotDePasseOublie = new MotDePasseOublieModels();
                if ($pseudo != $O_MotDePasseOublie ->getPseudo($email)) {
                    Vue::montrer("MotDePasseOublie", array('erreur' => 'Pseudonyme et email ne se correspondent pas'));
                }
                elseif ($email != $O_MotDePasseOublie ->getEmail($pseudo)) {
                    Vue::montrer("MotDePasseOublie", array('erreur' => 'Pseudonyme et email ne se correspondent pas'));
                }   
                elseif ($mdp1 != $mdp2) {
                    Vue::montrer("MotDePasseOublie", array('erreur' => 'Mot de passe pas identique'));
                }
                else{
                    $O_MotDePasseOublie -> modifiermdp($pseudo,$email,$mdp1);
                    Vue::montrer('MotDePasseOublie', array('reussite' => 'Modification prise en compte'));
                    $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email'=> $email,
                        'mdp1' => $mdp1,
                        "date_inscription" => $O_MotDePasseOublie -> getDateinscription($email),
                        "date_derniere_connexion" => date('y-m-d H:i:s'),
                        'user_type' => $O_MotDePasseOublie->getUserType($pseudo)
                    );
                    header('Location: ./index.php?url=Utilisateur');
                    exit;
                }   
        }
    }
