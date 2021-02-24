<?php
/**
 * Mini-framework en PHP objet qui permet de réaliser un CRUD sur une table d'une BDD MySQL/MariaDB
 * Etend la classe Singleton
 */

 include_once('singleton.class.php');

 class Model extends Singleton{
    // Attributs privés de la classe
    private $db=null;
    private $table = '';

    /**
     * Constructeur de la class
     * @param string $newTable - nom de la table
     */

     public function __construct(string $newHost, int $newPort, string $newDbName, string $newUser, string $newPass, string $newTable, $newOptions=array())
     {
         parent::setConfiguration($newHost, $newPort, $newDbName, $newUser, $newPass, $newOptions);
         $this->db=parent::getPDO();
         $this->table=$newTable;
     }

    /**
    * Méthode qui renvoie toutes les lignes d'un SELECT sous la forme d'un tableau associatif
    * @return array résultat de la requête SELECT
    */

    public function getRows(): array {
        try{
            $qry=$this->db->query('SELECT * FROM '.$this->table);
            return $qry->fetchAll();
        }catch (PDOException $err){
            throw new PDOException(__CLASS__.' : '.$err->getMessage());
        }
    }

    /**
     * Méthode qui renvoie une seule ligne d'un SELECT sous la forme d'un tableau associatif
     * @param string $pk - nom de la colonne clé primaire
     * @param string $id - valeur de l'ID recherché
     * @param array résultat de la requête SELECT
     */

     public function getRow(string $pk, string $id):array{
        try{
            $qry=$this->db->prepare('SELECT * FROM '.$this->table.' WHERE '.$pk.'=?');
             $qry->execute(array($id));
             return $qry->fetch();
        }catch (PDOException $err){
            throw new PDOException(__CLASS__.' : '.$err->getMessage());
        }
     }

    /**
     * Méthode qui insère une ligne dans la table
     * @param array $post - tableau du type $_POST
     */

     public function insert(array $post=array()):int{
        
        if(empty($post)) throw new Exception(__CLASS__.' : Le tableau ne doit pas être vide');
        else{
            // Remplit tableau des paramètre
             foreach($post as $key=>$val){
                 $vals[':'.$key]=$val;
             }
             // Prépare et exécute la requête
             $sql='INSERT INTO '. $this->table . '('.implode(',', array_keys($post)).') VALUES('.implode(',',array_keys($vals)).')';
             try{
                $qry=$this->db->prepare($sql);
                $qry->execute($vals);
                return $qry->rowCount();
             }catch (PDOException $err){
                throw new PDOException(__CLASS__.' : '.$err->getMessage());
            }
        }
     }
    
    /**
     * Méthode qui met à jour une ligne dans la table
     * @param array $post - tableau du type $_POST
     * @param string $pk - colonne clé primaire
     * @param string $id - valeur de l'ID recherché
     * @return int nombre de lignes impactées (defaut 1)
     */

     public function update(array $post, string $pk, string $id): int{
         // Remplit le tableau de paramètres
         foreach($post as $key=>$val){
             $vals[':'.$key]=$val;
             $set[]= $key.'='.$key;
         }
         $vals[':id']=$id;
         // Prépare et exécute la requête
         $sql='UPDATE '.$this->table.' SET '. implode(',',$set).' WHERE '.$pk.'=:id';
         try{
            $qry=$this->db->prepare($sql);
            $qry->execute($vals);
            return $qry->rowCount();
         }catch (PDOException $err){
                throw new PDOException(__CLASS__.' : '.$err->getMessage());
            }
     }
 }