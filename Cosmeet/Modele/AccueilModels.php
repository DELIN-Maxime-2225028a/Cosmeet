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

    public function modifierDerniereConnection() {
        $S_table = "utilisateurs";
        $data = [
            "date_derniere_connexion" => date('d-m-y H:i:s')
        ];
        $userId = $_SESSION['utilisateur']['email'];
        $where = "email = :email";
        $data['email'] = $userId;
        return $this->pdo->update($S_table, $data, $where);
    }
}

?>