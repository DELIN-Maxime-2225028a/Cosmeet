<?php
require_once 'Modele/ModifierPostModels.php';

class ControleurModifier {

    public function defautAction() {
        $this->modifierPostAction();
    }

    public function modifierPostAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $message = $_POST['message'];
            $nom_categorie = $_POST['categorie']; 
            $O_modifierPost = new ModifierModels();
            $O_modifierPost->modifierPost($titre, $message, $nom_categorie);
            header('Location: index.php?url=Accueil');
        }
    }
}