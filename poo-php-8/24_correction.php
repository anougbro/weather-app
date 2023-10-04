<?php

// Solution
abstract class Vehicule
{
    private static int $nbVehicules = 0;

    private int $matricule;
    private string $modele;
    private float $prix;

    public function __construct(string $modele, float $prix)
    {
        self::$nbVehicules++;
        $this->matricule = self::$nbVehicules;
        $this->modele = $modele;
        $this->prix = $prix;
    }

    public function getMatricule(): int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function getModele(): int
    {
        return $this->modele;
    }

    public function setModele(int $modele): void
    {
        $this->modele = $modele;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public abstract function demarrer(): void;

    public abstract function accelerer(): void;

    public function __toString(): string
    {
        return sprintf('Matricule %s, modèle %s, prix %f', $this->matricule, $this->modele, $this->prix);
    }
}

class Voiture extends Vehicule
{
    public function __construct(string $modele, float $prix)
    {
        parent::__construct($modele, $prix);
    }

    public function demarrer(): void
    {
        echo 'Démarrage de la voiture';
    }

    public function accelerer(): void
    {
        echo 'Accélaration de la voiture';
    }

    public function __toString(): string
    {
        return sprintf('Voiture %s', parent::__toString());
    }
}

class Camion extends Vehicule
{
    public function __construct(string $modele, float $prix)
    {
        parent::__construct($modele, $prix);
    }

    public function demarrer(): void
    {
        echo 'Démarrage du camion';
    }

    public function accelerer(): void
    {
        echo 'Accélaration du camion';
    }

    public function __toString(): string
    {
        return sprintf('Camion %s', parent::__toString());
    }
}

// Programme test
$voiture = new Voiture('Opel Corsa', 26000.00);
echo $voiture;
echo '<br />';
$voiture->demarrer();
echo '<br />';
$voiture->accelerer();

echo '<br />';
echo '<br />';

$camion = new Camion('Mega truck', 154000.00);
echo $camion;
echo '<br />';
$camion->demarrer();
echo '<br />';
$camion->accelerer();