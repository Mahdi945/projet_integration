<?php
require_once "../model/enseignant.php";


$crud = new enseignant();

$lesenseignants = $crud->findAll();


    
    

?>