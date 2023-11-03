<?php
require_once 'Noyau/Connection.php';

class ModifierModels
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::getInstance();     
    }


    public function modifierCom($id_publication, $commentaire)
    {
        $auteur = $_SESSION['utilisateur']['pseudo'];
        $S_table = "commentaires";
        $data = [
            "commentaire" => $commentaire,
            "auteur" => $auteur, 
            "date_commentaire" => date('y-m-d H:i:s')
        ];
        $where = "id_publication = :id_publication";
        $data['id_publication'] = $id_publication;

        return $this->pdo->update($S_table, $data, $where);
    }
}