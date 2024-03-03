<?php

class connexion
{
    function getConnexion()
    {
        $dsn = "mysql:host=localhost;dbname=pfe";
        $username = "root";
        $password = "";
        try {
             $connexion = new PDO($dsn, $username, $password);
             return $connexion;
            }catch(PDOException $e){
                echo "Connection failed : ". $e->getMessage();
              }
    }
}
