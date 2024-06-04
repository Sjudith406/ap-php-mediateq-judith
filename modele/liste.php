<?php

class Liste {
    private string $idListe;
    private string $idAbo; 
    private string $nomListe;
    private array $contenu;
    
    
    public function __construct(string $idListe, string $idAbo, string $nomListe, array $contenu) {
        $this->idListe = $idListe;
        $this->idAbo = $idAbo;
        $this->nomListe = $nomListe;
        $this->contenu = $contenu;
    }

    public function getIdListe(): string {
        return $this->idListe;
    }

    public function getIdAbo(): string {
        return $this->idAbo;
    }

    public function getNomListe(): string {
        return $this->nomListe;
    }

    public function getContenu(): array {
        return $this->contenu;
    }
}
?>