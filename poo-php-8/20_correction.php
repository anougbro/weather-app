<?php

// Solution
class Compte
{
    private static int $nbComptes = 0;

    protected ?int $id = null;
    protected ?int $solde;

    public function __construct(?int $solde = null)
    {
        self::$nbComptes++;
        $this->id = self::$nbComptes;
        $this->solde = $solde;
    }

    public function deposer(int $montant): void
    {
        if ($montant < 0) {
            throw new Exception();
        }

        $this->solde += $montant;
    }

    public function retirer(int $montant): void
    {
        if ($montant < 0) {
            throw new Exception();
        }

        $this->solde -= $montant;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function __toString(): string
    {
        if (null === $this->solde) {
            return sprintf('Le compte %d a un solde inexistant', $this->id) . '<br />';
        }

        return sprintf('Le compte %d a un solde de %d', $this->id, $this->solde ?? 0) . '<br />';
    }
}

class CompteEpargne extends Compte
{
    private const TAUX_INTERETS = 6;

    public function calculInteret(): void
    {
        $this->deposer(($this->solde * self::TAUX_INTERETS) / 100);
        echo 'Calcul du taux d\'intérêt effectué' . '<br />';
    }
}

class ComptePayant extends Compte
{
    private const PRIX_OPERATION = 5;

    public function deposer(int $montant): void
    {
        parent::deposer($montant);
        parent::retirer(self::PRIX_OPERATION);
    }

    public function retirer(int $montant): void
    {
        parent::retirer($montant);
        parent::retirer(self::PRIX_OPERATION);
    }
}

// Programme test
// Compte classique
$compte = new Compte();
echo $compte;
$compte->deposer(500);
echo $compte;
$compte->retirer(200);
echo $compte;

echo '<br />';

// Compte épargne
$compteEpargne = new CompteEpargne(1500);
echo $compteEpargne;
$compteEpargne->calculInteret();
echo $compteEpargne;

echo '<br />';

// Compte payant
$comptePayant = new ComptePayant(200);
echo $comptePayant;
$comptePayant->deposer(400);
echo $comptePayant;
$comptePayant->retirer(100);
echo $comptePayant;