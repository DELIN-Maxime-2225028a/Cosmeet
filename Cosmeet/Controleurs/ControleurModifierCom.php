<?php
require_once 'Modele/ModifierComModels.php';

class ControleurModifierCom {
    public function defautAction() {
        $this->modifierComAction();
    }

    public function modifierComAction() {
        $O_modifierCom = new ModifierComModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_commentaire = $_POST['id_commentaire'];
            $commentaire = $_POST['commentaire'];
            $O_modifierCom->modifierCom($id_commentaire, $commentaire);
            header('Location: index.php?url=Accueil');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id_commentaire = $_GET['id_commentaire'];
            $commentaire = $O_modifierCom->getCommentaireById($id_commentaire);
            Vue::montrer("ModifierCom",array('commentaire' => $commentaire));
        }
    }

    public function suprimerComAction($id_commentaire){
        $O_suprimerCom = new ModifierComModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_commentaire = $_POST['id_commentaire'];
            $O_suprimerCom->SuprimerCom($id_commentaire);
            header('Location: index.php?url=Accueil');
        }
    }  
}