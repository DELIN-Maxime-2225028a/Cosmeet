<?php

require_once 'Noyau/Connection.php';

class ModifierComModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    // Fonction pour modifier un commentaire dans la base de données.
    public function modifierCom($id_commentaire, $commentaire)
    {
        $auteur = $_SESSION['utilisateur']['email'];
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

    // Fonction pour supprimer un commentaire de la base de données.
    public function SuprimerCom($id_commentaire)
    {
        $S_table = "commentaires";
        $where = "id_commentaire = $id_commentaire";
        return $this->pdo->delete($S_table, $where);
    }

    // Fonction pour récupérer un commentaire spécifique par son ID.
    public function getCommentaireById($id_commentaire)
    {
        $sql = "SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(['id_commentaire' => $id_commentaire]);
        return $stmt->fetch();
    }
}
