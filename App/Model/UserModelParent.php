<?php
namespace App\Model;

use Core\Model\Model;

/**
 * @method ReadAll() | Récupère tous les utilisateurs
 * @method ReadOne(int $id) | Retourne un utilisateur en fonction de son id
 * @method delete(int $id) | Supprime un utilisateur en fonction de son id
 * @method create($data) | Enregistre un utilisateur dans la BDD
 */
class UserModelParent extends Model{

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "user_part";
    
    /**
     * Récupère un utilisateur en fonction de son email
     *
     * @param string $email
     * @return object
     */
    public function getUserByEmail(string $email):object
    {
        $statement = "SELECT * FROM user_part WHERE email = '$email'";
        return $this->db->getData($statement, true);
    }
 
 /*    public function create(array $data){
        $statement = "INSERT INTO user_part (nom,prenom,email,mot_de_passe,tel_portable,tel_fixe,role,token,created_at) VALUES ()";
    } */
} 