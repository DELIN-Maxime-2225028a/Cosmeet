<?php

require_once 'Modele/ModifierPostModels.php';

class ControleurModifierPost
{
    public function defautAction()
    {
        $this->modifierPostAction();
    }

    // Fonction de modification d'un post.
    public function modifierPostAction()
    {
        $O_modifierPost = new ModifierPostModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_publication = $_POST['id_publication'];
            $titre = $_POST['titre'];
            $message = $_POST['message'];
            $nom_categorie = $_POST['categorie'];
            $O_modifierPost->modifierPost($id_publication, $titre, $message, $nom_categorie);
            header('Location: index.php?url=Accueil');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id_publication = $_GET['id_publication'];
            $publication = $O_modifierPost->getPublicationById($id_publication);
            $categories = $O_modifierPost->getCategories();
            Vue::montrer("ModifierPost", array('publication' => $publication, 'categories' => $categories));
        }
    }

    // Fonction de suppression d'un post.
    public function suprimerPostAction($id_publication)
    {
        $O_supprimerPost = new ModifierPostModels();
        $O_supprimerCom = new ModifierComModels();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_publication = $_POST['id_publication'];
            $commentaireIds = $O_supprimerPost->getCommentaireIds($id_publication);
            foreach ($commentaireIds as $id_commentaire) {
                $O_supprimerCom->SuprimerCom($id_commentaire);
            }
            $O_supprimerPost->SuprimerPost($id_publication);
            header('Location: index.php?url=Accueil');
        }
    }
}
