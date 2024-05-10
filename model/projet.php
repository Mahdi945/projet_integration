<?php
class Projet
{
    private $titre;
    private $encadreur_iset;
    private $encadreur_entreprise;
    private $nom_entreprise;
    private $fiche;
    private $cin_etudiant1;
    private $cin_etudiant2;
    private $etat;

    // Constructor
    function __construct($titre, $encadreur_iset, $encadreur_entreprise, $nom_entreprise, $fiche, $cin_etudiant1, $cin_etudiant2, $etat)
    {
        $this->titre = $titre;
        $this->encadreur_iset = $encadreur_iset;
        $this->encadreur_entreprise = $encadreur_entreprise;
        $this->nom_entreprise = $nom_entreprise;
        $this->fiche = $fiche;
        $this->cin_etudiant1 = $cin_etudiant1;
        $this->cin_etudiant2 = $cin_etudiant2;
        $this->etat = $etat;
    }

    // Getter methods
    public function getTitre()
    {
        return $this->titre;
    }

    public function getEncadreurIset()
    {
        return $this->encadreur_iset;
    }

    public function getEncadreurEntreprise()
    {
        return $this->encadreur_entreprise;
    }

    public function getNomEntreprise()
    {
        return $this->nom_entreprise;
    }

    public function getFiche()
    {
        return $this->fiche;
    }

    public function getCinEtudiant1()
    {
        return $this->cin_etudiant1;
    }

    public function getCinEtudiant2()
    {
        return $this->cin_etudiant2;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    // Setter method
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }
}
?>