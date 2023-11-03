<?php
require_once 'Modele/ModifierModels.php';

class ControleurModifierCom {

    public function defautAction() {
        $this->modifierComAction();
    }

    public function modifierComAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentaire = $_POST['commentaire'];
            $O_modifierPost = new ModifierModels();
            $O_modifierPost->modifierCom($commentaire);
            header('Location: index.php?url=Accueil');
        }
    }
}