<?php

// Solution
class Batiment
{
    private Address $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function __toString(): string
    {
        return sprintf('Batiment à l\'adresse %s', $this->address);
    }
}

class Address
{
    private string $address1;
    private ?string $address2 = null;
    private string $zipCode;
    private string $city;

    /**
     * @param string $address1
     * @param string|null $address2
     * @param string $zipCode
     * @param string $city
     */
    public function __construct(string $address1, ?string $address2, string $zipCode, string $city)
    {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->zipCode = $zipCode;
        $this->city = $city;
    }

    public function getAddress1(): string
    {
        return $this->address1;
    }

    public function setAddress1(string $address1): void
    {
        $this->address1 = $address1;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): void
    {
        $this->address2 = $address2;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function __toString(): string
    {
        return sprintf('%s, %s, %s %s', $this->address1, $this->address2, $this->zipCode, $this->city);
    }
}

class Maison extends Batiment
{
    private int $nbPieces;

    public function __construct(Address $address, int $nbPieces)
    {
        parent::__construct($address);
        $this->nbPieces = $nbPieces;
    }

    public function getNbPieces(): int
    {
        return $this->nbPieces;
    }

    public function setNbPieces(int $nbPieces): void
    {
        $this->nbPieces = $nbPieces;
    }

    public function __toString(): string
    {
        return sprintf('Maison de %d pièces à l\'adresse %s', $this->nbPieces, $this->getAddress());
    }
}


// Programme test
$address_batiment = new Address(
    "2 rue du developpement web",
    "APP 204",
    "35000",
    "Rennes"
);

$batiment = new Batiment($address_batiment);
echo $batiment;

echo '<br />';

$address_maison = new Address(
    "5 rue du developpement mobile",
    null,
    "35000",
    "Rennes"
);

$maison = new Maison($address_maison, 4);
echo $maison;