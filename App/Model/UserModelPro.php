<?php
namespace App\Model;

use Core\Model\Model;

/**
 * @method ReadAll() | Récupère tous les utilisateurs
 * @method ReadOne(int $id) | Retourne un utilisateur en fonction de son id
 * @method delete(int $id) | Supprime un utilisateur en fonction de son id
 * @method create($data) | Enregistre un utilisateur dans la BDD
 * @method getIdByMail(string $string) | Récupère l'id d'un utilisateur en fonction de son email
 */
class UserModelPro extends Model{

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "user_pro";

    /**
     * Récupère un utilisateur en fonction de son email
     *
     * @param string $email
     * @return object
     */
    public function getUserByEmail(string $email):object
    {
        $statement = "SELECT * FROM user_pro WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }
}
