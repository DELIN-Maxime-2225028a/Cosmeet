<?php
require_once 'Modele/TriParCategorieModel.php';

class ControleurTriParCategorie {
    public function defautAction() {
        $this->trierParCategorieAction();
    }

    public function trierParCategorieAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categorie = $_GET['categorie'];
            
            $model = new TriParCategorieModel();
            $posts = $model->getPostsByCategorie($categorie);
            
            // Affichez les publications de la manière que vous voulez
        } else {
            Vue::montrer("TriParCategorie");
        }
    }
}