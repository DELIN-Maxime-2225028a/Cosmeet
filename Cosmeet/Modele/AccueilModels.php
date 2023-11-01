<?php
require_once 'Noyau/Connection.php';

class AccueilModels
{
    private $pdo;
    public function __construct(){
        $this->pdo = Connection::getInstance();     
    }
    function getPublications() {
        $query = "SELECT * FROM publications ORDER BY date_publication DESC";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function derniereConnection() {
        $S_table = "utilisateurs";
        $data = array('date_derniere_connexion' => date('d-m-Y H:i:s'));
        $where = "pseudo = :pseudo";
        return $this->pdo->update($S_table, $data, $where);
    }
}


?>