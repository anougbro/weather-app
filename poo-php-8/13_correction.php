<?php

// Solution
class Livre
{
    private const PRIX_MINIMUM = 1;
    private const PRIX_MAXIMUM = 100;

    private string $titre;
    private ?string $auteur;
    private float $prix;

    public function __construct(string $titre, ?string $auteur, float $prix)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->_checkPrix($prix);
        $this->prix = $prix;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): void
    {
        $this->auteur = $auteur;
    }

    private function _checkPrix(float $prix): void
    {
        if($prix < self::PRIX_MINIMUM || $prix > self::PRIX_MAXIMUM) {
            throw new \Exception();
        }
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    function setPrix(float $prix): void
    {
        $this->_checkPrix($prix);
        $this->prix = $prix;
    }

    public function afficher(): string
    {
        $s = sprintf('%s, ', $this->titre);
        if (null !== $this->auteur) {
            $s .= sprintf('Auteur: %s, ', $this->auteur);
        }
        $s .= sprintf('Prix: %f', $this->prix);

        return $s;
    }
}

// Programme test
$titre = 'Sunday le chat';
$auteur = null;
$prix = '12';

$livre = new Livre($titre, $auteur, $prix);
echo $livre->afficher();