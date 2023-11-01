<?php
require_once 'Modele/Ajout_publicationModels.php';
class ControleurAjout_publication {

    public function defautAction() {
        $this->addPublicationAction();
    }

    public function addPublicationAction() {
        $titre = $_POST['titre'];
        $message = $_POST['message'];
        $nom_categorie = $_POST['categorie']; 
        $O_ajoutpublication = new Ajout_PublicationModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($O_ajoutpublication ->CategorieExiste($nom_categorie)){
                $model = new Ajout_PublicationModels();
                $model->addPublication($titre, $message, $nom_categorie);
                header('Location: index.php?url=Accueil');
            }
            else{
                Vue::montrer("Accueil", array('erreur' => 'La categorie n\'existe pas'));
            }
                
        } else {
            Vue::montrer("Accueil", array('erreur' => 'La categorie n\'existe pas'));
        }
    }
}