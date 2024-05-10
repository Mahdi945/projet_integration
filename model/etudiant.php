<?php
class etudiant
{
    private $cin_etudiant1;
    private $password;
    private $nom_prenom_etud1; 
    private $email_etud1 ;
    private $groupe_etud1; 
    private $cin_etud2; 
    private $nom_prenom_etud2; 
    private $email_etud2; 
    private $groupe_etud2;
    private $etat; // Nouvelle variable 'etat'

    function __construct($cin_etudiant1, $password, $nom_prenom_etud1, $email_etud1, $groupe_etud1, $cin_etud2, $nom_prenom_etud2, $email_etud2, $groupe_etud2, $etat)
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
        $this->etat = $etat;
    }

    // Getters
    public function getCinEtudiant1() {
        return $this->cin_etudiant1;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNomPrenomEtud1() {
        return $this->nom_prenom_etud1;
    }

    public function getEmailEtud1() {
        return $this->email_etud1;
    }

    public function getGroupeEtud1() {
        return $this->groupe_etud1;
    }

    public function getCinEtud2() {
        return $this->cin_etud2;
    }

    public function getNomPrenomEtud2() {
        return $this->nom_prenom_etud2;
    }

    public function getEmailEtud2() {
        return $this->email_etud2;
    }

    public function getGroupeEtud2() {
        return $this->groupe_etud2;
    }

    public function getEtat() {
        return $this->etat;
    }

    // Setters
    public function setCinEtudiant1($cin_etudiant1) {
        $this->cin_etudiant1 = $cin_etudiant1;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setNomPrenomEtud1($nom_prenom_etud1) {
        $this->nom_prenom_etud1 = $nom_prenom_etud1;
    }

    public function setEmailEtud1($email_etud1) {
        $this->email_etud1 = $email_etud1;
    }

    public function setGroupeEtud1($groupe_etud1) {
        $this->groupe_etud1 = $groupe_etud1;
    }

    public function setCinEtud2($cin_etud2) {
        $this->cin_etud2 = $cin_etud2;
    }

    public function setNomPrenomEtud2($nom_prenom_etud2) {
        $this->nom_prenom_etud2 = $nom_prenom_etud2;
    }

    public function setEmailEtud2($email_etud2) {
        $this->email_etud2 = $email_etud2;
    }

    public function setGroupeEtud2($groupe_etud2) {
        $this->groupe_etud2 = $groupe_etud2;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }
}

