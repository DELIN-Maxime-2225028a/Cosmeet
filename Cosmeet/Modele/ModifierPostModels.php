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

    public function getPublicationById($id_publication)
    {
        $sql = "SELECT * FROM publications WHERE id_publication = :id_publication";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(['id_publication' => $id_publication]);
        return $stmt->fetch();
    }

    public function getCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
