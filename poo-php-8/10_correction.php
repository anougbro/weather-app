<?php

// Solution
namespace App;

use DateTime;

class Employe
{
    private string $matricule;
    private string $nom;
    private string $prenom;
    private Datetime $dateNaissance;
    private Datetime $dateEmbauche;
    private float $salaire;

    public function __construct(string $matricule, string $nom, string $prenom, DateTime $dateNaissance, DateTime $dateEmbauche, float $salaire)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->dateEmbauche = $dateEmbauche;
        $this->salaire = $salaire;
    }

    private function age(): int
    {
        $now = new DateTime('now');
        return ($now->diff($this->dateNaissance))->y;
    }

    private function anciennete(): int
    {
        $now = new DateTime('now');
        return ($now->diff($this->dateEmbauche))->y;
    }

    private function augmentationSalaire(): void
    {
        switch (true) {
            case $this->anciennete() < 5:
                $this->salaire += $this->salaire * 0.02;
                break;
            case $this->anciennete() < 10:
                $this->salaire += $this->salaire * 0.05;
                break;
            default:
                $this->salaire += $this->salaire * 0.1;
                break;
        }
    }

    public function afficher(): string
    {
        $h = sprintf('Matricule: %s', $this->matricule) . '<br />';
        $h .= sprintf('Nom complet: %s', $this->getFullName()) . '<br />';
        $h .= sprintf('Age: %s', $this->age()) . '<br />';
        $h .= sprintf('Ancienneté: %s', $this->anciennete()) . '<br />';
        $h .= sprintf('Salaire: %s', $this->afficherSalaire()) . '<br />';

        $h .= 'Après augmentation du salaire' . '<br />';
        $this->augmentationSalaire();
        $h .= sprintf('Salaire: %s', $this->afficherSalaire()) . '<br />';

        return $h;
    }

    private function getFullName()
    {
        return sprintf('%s %s', $this->prenom, $this->nom);
    }

    private function afficherSalaire(): string
    {
        return sprintf('%s %s', number_format($this->salaire, 2, ',', ' '), '€');
    }
}

// Programme test
$matricule = 'MA-123456789';
$nom = 'Musclé';
$prenom = 'Développeur';
$dateNaissance = DateTime::createFromFormat('d/m/Y', '10/11/1998');
$dateEmbauche = DateTime::createFromFormat('d/m/Y', '08/08/2012');
$salaire = 30500.59;

$employe = new Employe($matricule, $nom, $prenom, $dateNaissance, $dateEmbauche, $salaire);

echo $employe->afficher();