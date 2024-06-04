<?php
class HistRecherche
{
    private string $titreH;
    private string $typeDocH;
    private string $typeRechH;
    private string $derniereRechH;
    private int $nbResultatH;

    public function __construct(string $titreH, string $typeDocH, string $typeRechH, string $derniereRechH, int $nbResultatH)
    {
        $this->titreH = $titreH;
        $this->typeDocH = $typeDocH;
        $this->typeRechH = $typeRechH;
        $this->derniereRechH = $derniereRechH;
        $this->nbResultatH = $nbResultatH;
    }

    public function getTitreH() : string
    {
        return $this->titreH;
    }

    public function getTypeDH() : string
    {
        return $this->typeDocH;
    }

    public function getTypeRH() : string
    {
        return $this->typeRechH;
    }

    public function getLastR() : string
    {
        return $this->derniereRechH;
    }

    public function getNbResultH() : int
    {
        return $this->nbResultatH;
    }
}
?>