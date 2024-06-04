<?php

class Connexion
{
    private string $mailU;
    private string $mdpU;

    public function __construct(string $mailU, string $mdpU)
    {
        $this->mailU = $mailU;
        $this->mdpU = $mdpU;
    }

    public function getMailU() : string
    {
        return $this->mailU;
    }

    public function getMdpU() : string
    {
        return $this->mdpU;
    }
}