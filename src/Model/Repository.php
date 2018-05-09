<?php

namespace App\Model;

use \PDO;

/**
 * class repository
 * 
 * @abstract 
 * class abstraite pour qu'elle ne soit pas instenciée. Seulement ses filles doivent pouvoir l'être.
 */
abstract class Repository
{
    /**
     * @var int 
     * data to connect with database
     */
    private $db;
    
    /**
     * @return db
     */
    protected function getDb()
    {
        if ($this->db === NULL)
        {
            try
            {
                $db = new \PDO('mysql:dbname=tpblog;host=localhost;charset=utf8', 'root', '' );

                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $this->db = $db;

                return $this->db;
            }
            catch(PDOException $e)
            {
                die('Echec lors de la connexion : '.$e->getMessage());
            }
        }

        return $this->db;
    }
}
