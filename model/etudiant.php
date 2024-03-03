<?php
class etudiant
{
    private $cin_etudiant1;
    private $password;
    private $nom_prenom_etud1;	
    private $email_etud1	;
    private $groupe_etud1;	
    private $cin_etud2;	
    private $nom_prenom_etud2;	
    private $email_etud2;	
    private $groupe_etud2;
    
    function __construct($cin_etudiant1, $password, $nom_prenom_etud1, $email_etud1, $groupe_etud1, $cin_etud2, $nom_prenom_etud2, $email_etud2, $groupe_etud2)
    {
        $this->cin_etudiant1 = $cin_etudiant1;
        $this->password = $password;
        $this->nom_prenom_etud1 = $nom_prenom_etud1;
        $this->email_etud1 = $email_etud1;
        $this->groupe_etud1 = $groupe_etud1;
        $this->cin_etud2 = $cin_etud2;
        $this->nom_prenom_etud2 = $nom_prenom_etud2;
        $this->email_etud2 = $email_etud2;
        $this->groupe_etud2 = $groupe_etud2;
    }
}