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
class LocalisationModel extends Model{

    /**
     * Nom de la table
     *
     * @var string
     */
    protected $table = "user_pro";


}
