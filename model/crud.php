<?php
require_once "../config.php";
abstract class crud
{
    protected $pdo;
    protected $table;
    public function __construct()
    {
        $obj = new connexion();
        $this->pdo = $obj->getConnexion();
    }
}
