<?php
require_once 'Noyau/Connection.php';

class ModifierComModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function modifierCom($id_commentaire, $commentaire)
    {
        $auteur = $_SESSION['utilisateur']['pseudo'];
        $S_table = "commentaires";
        $data = [
            "commentaire" => $commentaire,
            "auteur" => $auteur,
            "date_commentaire" => date('y-m-d H:i:s')
        ];
        $where = "id_commentaire = :id_commentaire";
        $data['id_commentaire'] = $id_commentaire;

        return $this->pdo->update($S_table, $data, $where);
    }

    public function getCommentaireById($id_commentaire)
    {
        $sql = "SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(['id_commentaire' => $id_commentaire]);
        return $stmt->fetch();
    }
}