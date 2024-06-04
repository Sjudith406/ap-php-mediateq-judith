<?php
class Abonnee
{
    private string $loginA;
    private string $nomA;
    private string $prenomA;
    private string $mdpA;
    private string $adresseA;
    private string $numTel;
    private string $typeA;
    private string $numA;
    private string $mailA;

    public function __construct(string $numA, string $loginA, string $nomA, string $prenomA, string $mdpA, string $adresseA, string $numTel, string $typeA, string $mailA)
    {
        $this->numA = $numA;
        $this->loginA = $loginA;
        $this->nomA = $nomA;
        $this->prenomA = $prenomA;
        $this->mdpA = $mdpA;
        $this->adresseA = $adresseA;
        $this->numTel = $numTel;
        $this->typeA = $typeA;
        $this->mailA = $mailA;
    }

    public function getNumA() : string
    {
        return $this->numA;
    }

    public function getMailA() : string
    {
        return $this->mailA;
    }

    public function getLogin() : string
    {
        return $this->loginA;
    }

    public function getMdp() : string
    {
        return $this->mdpA;
    }

    public function getNom() : string
    {
        return $this->nomA;
    }

    public function getPrenom() : string
    {
        return $this->prenomA;
    }

    public function getAdresse() : string
    {
        return $this->adresseA;
    }

    public function getNum() : string
    {
        return $this->numTel;
    }

    public function getType() : string
    {
        return $this->typeA;
    }
}

?>