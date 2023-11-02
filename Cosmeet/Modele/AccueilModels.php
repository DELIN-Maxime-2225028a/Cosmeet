<?php
require_once 'Noyau/Connection.php';

class AccueilModels
{
    private $pdo;
    public function __construct(){
        $this->pdo = Connection::getInstance();     
    }
    
    public function getPublications() {
        $sql = "SELECT * FROM publications ORDER BY date_publication DESC";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCommentaires() {
        $query = "SELECT * FROM commentaires ORDER BY id_publication ASC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modifierDerniereConnection() {
        $S_table = "utilisateurs";
        $data = [
            "date_derniere_connexion" => date('Y-m-d H:i:s')
        ];
        $userId = $_SESSION['utilisateur']['email'];
        $where = "email = :email";
        $data['email'] = $userId;
        $_SESSION['derniere_connexion'] = array(
            "date_derniere_connexion" => date('Y-m-d H:i:s')
        );
        return $this->pdo->update($S_table, $data, $where);
    }
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $result = $this->pdo->getPdo()->query($sql);
        return $result->fetchAll();
    }

    public function getPublicationsByCategorie($categorie) {
        $sql = "SELECT * FROM publications WHERE categorie = ?";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute([$categorie]);
        return $stmt->fetchAll();
    }
}

?>