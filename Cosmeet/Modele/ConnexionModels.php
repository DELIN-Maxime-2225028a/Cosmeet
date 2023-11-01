<?php
require_once 'Noyau/Connection.php';

class ConnexionModels
{
    private $pdo;
    public function __construct()     {
        $this->pdo = Connection::getInstance();     
    }

    public function afficher($pseudo,$mdp1,$mdp2){
        return $pseudo && $mdp1 && $mdp2;
    }

    public function pseudonymeExiste($pseudo)
    {
    $query = "SELECT count(*) FROM utilisateurs WHERE pseudonyme = :pseudo";
    $stmt = $this->pdo->getPdo()->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    
    return $result > 0;
    }

    public function verifierUtilisateur($pseudo, $mdp1)
    {
        $query = "SELECT * FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $utilisateur = $stmt->fetch();

        if ($utilisateur) {
            return password_verify($mdp1, $utilisateur['mot_de_passe']);
        }
        
        return false;
    }

    public function getEmail($pseudo){
        $query = "SELECT email FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $email = $stmt->fetchColumn();
        return $email;
    }

    public function getDateinscription($pseudo){
        $query = "SELECT date_inscription FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $date_inscription = $stmt->fetchColumn();
        return $date_inscription;
    }
    
}
?>