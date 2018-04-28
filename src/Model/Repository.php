<?php

namespace App\Model;
use PDO;

// class abstraite pour qu'elle ne soit pas instenciée. Seulement ses filles doivent pouvoir l'être.
abstract class Repository
{
    protected $db;

    public function __contructs()
    {
        try
        {
            $this->db = new \PDO('mysql:dbname=tpblog;host=localhost;charset=utf8', 'root', '' );

            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die('Echec lors de la connexion : '.$e->getMessage());
        }
    }

    protected function getPDO()
    {
        return $this->db;
    }
}