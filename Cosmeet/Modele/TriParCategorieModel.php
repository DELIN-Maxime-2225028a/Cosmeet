<?php
class TriParCategorieModel {
    private $pdo;

    public function __construct() {
        $this->pdo = Connection::getInstance();
    }

    public function getPostsByCategorie($categorie) {
        $query = "SELECT * FROM publications WHERE categorie = ?";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute([$categorie]);
        return $stmt->fetchAll();
    }
}