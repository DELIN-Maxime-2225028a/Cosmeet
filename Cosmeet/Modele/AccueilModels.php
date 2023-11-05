<?php
require_once 'Noyau/Connection.php';

class AccueilModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }
    function getPublications()
    {
        $query = "SELECT * FROM publications ORDER BY id_publication DESC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPublications2($start = 0, $nombre = 3)
    {
        $query = "SELECT * FROM publications ORDER BY id_publication DESC LIMIT :start, :nombre";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCommentaires()
    {
        $query = "SELECT * FROM commentaires ORDER BY id_publication ASC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategories()
    {
        $query = "SELECT nom_categorie FROM categories";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCategories2($start = 0, $nombre = 5)
    {
        $query = "SELECT * FROM categories ORDER BY id_categorie DESC LIMIT :start, :nombre";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modifierDerniereConnection()
    {
        $S_table = "utilisateurs";
        $data = [
            "date_derniere_connexion" => date('y-d-m H:i:s')
        ];
        $userId = $_SESSION['utilisateur']['email'];
        $where = "email = :email";
        $data['email'] = $userId;
        $_SESSION['derniere_connexion'] = array(
            "date_derniere_connexion" => date('y-m-d h:i:s')
        );
        return $this->pdo->update($S_table, $data, $where);
    }

    public function getRecherche($recherche)
{
    $query = "SELECT DISTINCT publications.* FROM publications 
    LEFT JOIN commentaires ON publications.id_publication = commentaires.id_publication
    LEFT JOIN categories ON publications.categorie = categories.nom_categorie
    WHERE publications.titre LIKE :recherche OR publications.date_publication LIKE :recherche 
    OR publications.message LIKE :recherche OR publications.auteur LIKE :recherche 
    OR publications.categorie LIKE :recherche OR commentaires.commentaire LIKE :recherche 
    OR commentaires.auteur LIKE :recherche OR commentaires.date_commentaire LIKE :recherche
    OR categories.nom_categorie LIKE :recherche OR categories.description_categorie LIKE :recherche
    ORDER BY id_publication DESC";
    $stmt = $this->pdo->getPdo()->prepare($query);
    $stmt->bindValue(':recherche', "%$recherche%");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
