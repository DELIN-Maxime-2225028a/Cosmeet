<?php

require_once 'Modele/UtilisateurModels.php';
class ControleurUtilisateur {
    public function defautAction(){
        if (isset($_SESSION['utilisateur'])) {
            $utilisateur = $_SESSION['utilisateur'];
            $pseudo = $utilisateur['pseudo'];
            Vue::montrer('Utilisateur');
        } else {
            Vue::montrer("Connexion", array('erreur'=>'Vous n\'êtes pas connecté' ));
        }
    }

    public function decoAction() {
        unset($_SESSION['utilisateur']);
        Vue::montrer('Connexion');
    }

    public function modifierPageAction(){
        Vue::montrer('UtilisateurModifier');
    }

    public function modifierAction(array $urlParameters, array $A_postParams = null) {
        $pseudo = $A_postParams['pseudo'];
        $email = $A_postParams['email'];
        $mdp = $A_postParams['mdp'];

            $O_Utilisateur = new Utilisateur();
                if ($O_Utilisateur->pseudoUtilise($pseudo) && $pseudo != $_SESSION['utilisateur']['pseudo']) {
                    Vue::montrer("Utilisateur", array('erreur' => 'Pseudonyme déjà utilisé'));
                }
                elseif($pseudo == $_SESSION['utilisateur']['pseudo']){
                    Vue::montrer("Utilisateur", array('erreur' => 'pseudonyme pas changer'));
                }
                elseif ($email != $_SESSION['utilisateur']['email']) {
                    Vue::montrer("Utilisateur", array('erreur' => 'Email incorect'));
                }   
                elseif ($mdp != $_SESSION['utilisateur']['mdp1']) {
                    Vue::montrer("Utilisateur", array('erreur' => 'Mot de passe incorect'));
                }
                else{
                    $O_Utilisateur -> modifierpseudo($pseudo,$email);
                    Vue::montrer('Utilisateur', array('reussite' => 'Modification prise en compte'));
                    $_SESSION['utilisateur'] = array(
                        'pseudo' => $pseudo,
                        'email'=> $email,
                        'mdp1' => $mdp,
                        "date_inscription" => $O_Utilisateur -> getDateinscription($pseudo),
                        "date_derniere_connexion" => date('y-m-d H:i:s')
                    );
                    header('Location: ../Cosmeet/index.php?url=Utilisateur');
                    exit;
                }   
        }
    }
