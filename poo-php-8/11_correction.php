<?php

// Solution
namespace App;

class Point
{
    public float $x;
    public float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function afficher(): void
    {
        echo sprintf('Point(%f,%f)', $this->x, $this->y) . '<br />';
    }
}

class Cercle
{
    private Point $centre;
    private float $rayon;

    public function __construct(Point $centre, float $rayon)
    {
        $this->centre = $centre;
        $this->rayon = $rayon;
    }

    public function getPerimetre(): float
    {
        return number_format(2 * pi() * $this->rayon, 2);
    }

    public function getSurface(): float
    {
        return number_format(pi() * $this->rayon * $this->rayon, 2);
    }

    public function appartient(Point $p): bool
    {
        $distance = sqrt(pow($this->centre->x - $p->x, 2) + pow($this->centre->y - $p->y, 2));
        return $distance <= $this->rayon;
    }

    public function afficher(): void
    {
        $s = sprintf('Cercle(%f,%f)', $this->centre->x, $this->centre->y) . '<br />';
        $s .= sprintf('Perimètre: %f', $this->getPerimetre()) . '<br />';
        $s .= sprintf('Surface: %f', $this->getSurface()) . '<br />';

        echo $s;
    }
}

// Programme test
$cercle = new Cercle(new Point(1, 2), 3);
$cercle->afficher();
echo $cercle->getPerimetre();
echo $cercle->getSurface();

$pointX = 2;
$pointY = 3;
$point = new Point($pointX, $pointY);
$point->afficher();

$appartientAuCercle = $cercle->appartient($point);
echo $appartientAuCercle ? 'Le point appartient au cercle' : 'Le point n\'appartient pas au cercle';