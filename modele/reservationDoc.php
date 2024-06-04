<?php

class ReservationDoc {
    private int $idDoc;
    private string $numEx; 
    private string $idAbo;
    private string $dateReservation;
    private string $image;
    private string $titre;
    
    public function __construct(int $idDoc, string $numEx, string $idAbo, string $dateReservation, string $image, string $titre) {
        $this->idDoc = $idDoc;
        $this->numEx = $numEx;
        $this->idAbo = $idAbo;
        $this->dateReservation = $dateReservation;
        $this->image = $image;
        $this->titre = $titre;
    }

    public function getIdDoc(): int {
        return $this->idDoc;
    }

    public function getNumEx(): string {
        return $this->numEx;
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

    public function getTitre(): string {
        return $this->titre;
    }
}
?>