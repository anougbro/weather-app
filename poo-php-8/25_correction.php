<?php

// Solution
abstract class Employe
{
    private int $matricule;
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;

    public function __construct(int $matricule, string $nom, string $prenom, DateTime $dateNaissance)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function getMatricule(): int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getDateNaissance(): DateTime
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(DateTime $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    public function __toString(): string
    {
        return sprintf(
            'Matricule: %s, Nom: %s, Prénom: %s, Date de naissance: %s',
            $this->matricule,
            $this->nom,
            $this->prenom,
            $this->dateNaissance->format('d/m/Y')
        );
    }

    public abstract function getSalaire(): float;
}

class Ouvrier extends Employe
{
    private static float $smig = 2500;
    private DateTime $dateEntree;

    public function __construct(int $matricule, string $nom, string $prenom, DateTime $dateNaissance, DateTime $dateEntree)
    {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
        $this->dateEntree = $dateEntree;
    }

    public function getSalaire(): float
    {
        $salaire = 0.0;
        $today = new DateTime('now');
        $anciennete  = (int) $today->format('Y') - (int) $this->dateEntree->format('Y');

        if (self::$smig + $anciennete * 100 <= 2 * self::$smig) {
            $salaire = self::$smig + $anciennete * 100;
        } else {
            $salaire = self::$smig * 2;
        }

        return $salaire;
    }

    public static function getSmig(): float
    {
        return self::$smig;
    }

    public static function setSmig(float $smig): void
    {
        self::$smig = $smig;
    }

    public function getDateEntree(): DateTime
    {
        return $this->dateEntree;
    }

    public function setDateEntree(DateTime $dateEntree): void
    {
        $this->dateEntree = $dateEntree;
    }

    public function __toString(): string
    {
        return sprintf('Employé %s', parent::__toString());
    }
}

class Cadre extends Employe
{
    private int $indice;

    public function __construct(int $matricule, string $nom, string $prenom, DateTime $dateNaissance, int $indice)
    {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
        $this->indice = $indice;
    }

    public function getIndice(): int
    {
        return $this->indice;
    }

    public function setIndice(int $indice): void
    {
        $this->indice = $indice;
    }

    public function getSalaire(): float
    {
        return match ($this->indice) {
            1 => 13000,
            2 => 15000,
            3 => 17000,
            4 => 20000,
            default => -1
        };
    }

    public function __toString(): string
    {
        return sprintf('Cadre %s', parent::__toString());
    }
}

class Patron extends Employe
{
    public static float $ca;

    private float $pourcentage;

    public function __construct(int $matricule, string $nom, string $prenom, DateTime $dateNaissance, float $pourcentage)
    {
        parent::__construct($matricule, $nom, $prenom, $dateNaissance);
        $this->pourcentage = $pourcentage;
    }

    public function getPourcentage(): float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): void
    {
        $this->pourcentage = $pourcentage;
    }

    public function getSalaire(): float
    {
        return round((self::$ca * $this->pourcentage / 100) / 12, 2);
    }

    public function __toString(): string
    {
        return sprintf('Patron %s', parent::__toString());
    }
}

// Programme test
$ouvrier = new Ouvrier(1, 'Nom ouvrier', 'Prénom ouvrier', new DateTime('1965-11-4'), new DateTime('1995-3-20'));
echo $ouvrier;
echo '<br />';
echo 'Salaire ouvrier : ' . $ouvrier->getSalaire();

echo '<br />';
echo '<br />';

$cadre = new Cadre(2, 'Nom cadre', 'Prénom cadre', new DateTime('1975-11-4'), 3);
echo $cadre;
echo '<br />';
echo 'Salaire cadre : ' . $cadre->getSalaire();

echo '<br />';
echo '<br />';

Patron::$ca = 900000.20;
$patron = new Patron(3, 'Nom patron', 'Prénom patron', new DateTime('1985-11-4'), 3);
echo $patron;
echo '<br />';
echo 'Salaire cadre : ' . $patron->getSalaire();