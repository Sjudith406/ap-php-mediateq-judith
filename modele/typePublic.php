<?php

class TypePublic {
    private int $id;
    private string $libelle; 
    
    /**
     * Constructeur de la classe TypePublic
     *
     * @param integer $id
     * @param string $libelle
     */
    public function __construct(int $id, string $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    /** Accesseur de la propriété id */
    public function getId() : int {
        return $this->id;
    }

    /** Accesseur de la propriété libelle */
    public function getLibelle() : string {
        return $this->libelle;
    }

    /**
     * Mutateur de la propriété id
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Mutateur de la propriété libelle
     *
     * @param string $libelle
     * @return void
     */
    public function setLibelle(string $libelle): void {
        $this->libelle = $libelle;
    }

}
?>