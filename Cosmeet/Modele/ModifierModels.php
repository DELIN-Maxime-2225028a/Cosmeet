<?php
require_once 'Noyau/Connection.php';

class ModifierModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();     
    }

    public function modifierPost($id_publication, $titre, $message, $nom_categorie = NULL)
    {
        $auteur = $_SESSION['utilisateur']['pseudo'];
        $S_table = "publications";
        $data = [
            "titre" => $titre,
            "message" => $message,
            "categorie" => $nom_categorie,
            "auteur" => $auteur, 
            "date_publication" => date('y-m-d H:i:s')
        ];
        $where = "id_publication = :id_publication";
        $data['id_publication'] = $id_publication;

        return $this->pdo->update($S_table, $data, $where);
    }

    public function modifierCom($id_publication, $commentaire)
    {
        $auteur = $_SESSION['utilisateur']['pseudo'];
        $S_table = "commentaires";
        $data = [
            "commentaire" => $commentaire,
            "auteur" => $auteur, 
            "date_commentaire" => date('y-m-d H:i:s')
        ];
        $where = "id_publication = :id_publication";
        $data['id_publication'] = $id_publication;

        return $this->pdo->update($S_table, $data, $where);
    }
}