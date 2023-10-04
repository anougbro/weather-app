<?php

// Solution
namespace App;

class Livre
{
    private string $titre;
    private string $auteur;
    private float $prix;

    public function __construct(string $titre, string $auteur, float $prix)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->prix = $prix;
    }

    public function afficher(): string
    {
        return sprintf('%s, Auteur: %s, Prix: %f', $this->titre, $this->auteur, $this->prix);
    }
}

// Programme test
$titre = 'Sunday le chat';
$auteur = 'Développeur Musclé';
$prix = '12';

$livre = new Livre($titre, $auteur, $prix);
echo $livre->afficher();