<?php

namespace App\Model;
use PDO;

// class abstraite pour qu'elle ne soit pas instenciée. Seulement ses filles doivent pouvoir l'être.
abstract class Repository
{
    protected $db_name;
    protected $db_user;
    protected $db_pass;
    protected $db_host;
    protected $pdo;

    public function __contruct($name, $host, $user, $password)
    {
        $this->$db_name = $name;
        $this->db_user = $user;
        $this->db_pass = $password;
        $this->db_host = $host;
    }

    protected function getPDO()
    {
        try
        {
            $pdo = new PDO('mysql:dbname=tpblog;host=localhost;charset=utf8', 'root', '' );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }
        catch(PDOException $e)
        {
            die('Echec lors de la connexion : '.$e->getMessage());
        }

    }
}