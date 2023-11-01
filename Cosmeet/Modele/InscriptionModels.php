<?php
require_once 'Noyau/Connection.php';

class InscriptionModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();     
    }

    public function afficher($pseudo,$email,$mdp1,$mdp2){
        return $pseudo && $email && $mdp1 && $mdp2;
    }

    public function mdp1egalemdp2($mdp1, $mdp2)
    {
        return $mdp1 === $mdp2; 
    }

    public function inscription($pseudo,$email,$mdp1)
    {
        $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
        $S_table = "utilisateurs";
        $A_parametres = [
            "pseudonyme" => "$pseudo",
            "email" => "$email",
            "mot_de_passe" => "$mdp1",
            "date_inscription" => date('Y-m-d H:i:s'),
            "date_derniere_connexion" => date('Y-m-d H:i:s')
        ];
        return $this->pdo->insert($S_table, $A_parametres);
    }

    public function emailUtiliser($email)
    {
        $query = "SELECT count(*) FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        
        return $result > 0;
    }

    public function pseudoUtilise($pseudo)
    {
        $query = "SELECT count(*) FROM utilisateurs WHERE pseudonyme = :pseudo";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        
        return $result > 0;
    }

}
?>