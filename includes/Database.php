<?php

class Database {
    private $db_host = 'localhost';
    private $db_name = 'bayt';
    private $db_user = 'root';
    private $db_password = '';
    private $db_charset = 'utf8';
    private $dsn;
    private $pdo;
    private $error;
 
    /* CONNEXION A LA BASE DE DONNEES */

    public function __construct() {
        $this->dsn = "mysql:host={$this->db_host};dbname={$this->db_name};charset={$this->db_charset}";
        try {
                $this->pdo = new PDO($this->dsn,$this->db_user, $this->db_password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }
    
    /* FERMER LA CONNEXION A LA BASE DE DONNEES */

/*     private function shutdown() {
        $this->pdo = null;
        return true;
    } */

    /* REQUÊTE QUERY A LA BASE DE DONNEES */

/*     public function query($statement) {
        $request = $this->pdo->query($statement); */
        /* $this->shutdown(); */
/*         return $request;
    } */
 
    /* REQUÊTE PREPARE A LA BASE DE DONNEES */

    public function prepare(String $stmt, Array $fields = []):bool {
        $req = $this->pdo->prepare($stmt);
        $req->execute($fields);
        return $req;
      }


    public function is_already_in_use(String $field, String $value, String $table):bool
    {
      $req = $this->pdo->prepare("SELECT id FROM $table WHERE $field = ?");
      $req->execute([$value]);
      $count = $req->rowCount();
      $req->closeCursor();
      return $count;
    }
}     