<?php
class ReservationRevue {
    private int $idRevue;
    private string $numero; 
    private string $idAbo;
    private string $dateReservation;
    private string $image;
    private string $titre;
    
    public function __construct(int $idRevue, string $numero, string $idAbo, string $dateReservation, string $image, string $titre) {
        $this->idRevue = $idRevue;
        $this->numero = $numero;
        $this->idAbo = $idAbo;
        $this->dateReservation = $dateReservation;
        $this->image = $image;
        $this->titre = $titre;
    }

    public function getIdRevue(): int {
        return $this->idRevue;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function getIdAbo(): string {
        return $this->idAbo;
    }

    public function getDateReservation(): string {
        return $this->dateReservation;
    }

    public function getImage(): string {
        return $this->image;
    }
}
?>
