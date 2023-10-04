<?php

// Solution
class Vecteur2D
{
    private static int $nbVecteurs = 0;

    protected float $x;
    protected float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function getNbVecteurs(): int
    {
        return self::$nbVecteurs;
    }

    public function getNorme(): float
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
    }

    public function __toString(): string
    {
        return sprintf('X =%f - Y=%f', $this->x, $this->y);
    }
}

class Vecteur3D extends Vecteur2D
{
    private float $z;

    public function __construct(float $x, float $y, float $z)
    {
        parent::__construct($x, $y);
        $this->z = $z;
    }

    public function getNorme(): float
    {
        return sqrt($this->x * $this->x + $this->y * $this->y + $this->z * $this->z);
    }

    public function __toString(): string
    {
        return sprintf('%s - Z=%f', parent::__toString(), $this->z);
    }
}

// Programme test
$vecteur2D = new Vecteur2D(3, 4);
echo $vecteur2D;
echo '<br />';
echo $vecteur2D->getNorme();
echo '<br />';
echo '<br />';

$vecteur3D = new Vecteur3D(3, 6, 8);
echo $vecteur3D;
echo '<br />';
echo $vecteur3D->getNorme();