<?php
require_once 'Noyau/Connection.php';

class ModifierPostModels
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
}