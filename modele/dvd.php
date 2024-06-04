<?php

class Dvd extends Document {
    private string $synopsis;
    private string $realisateur; 
    private int $duree;
    private string $studio;
    private string $genre;
    private string $date;
    
    /**
     * constructeur de la classe Dvd
     *
     * @param integer $id
     * @param string $titre
     * @param string $image
     * @param boolean $commandeEnCours
     * @param TypePublic $public
     * @param string $synopsis
     * @param string $realisateur
     * @param integer $duree
     */
    public function __construct(int $id, string $titre, string $image, bool $commandeEnCours, TypePublic $public, string $synopsis, string $realisateur, int $duree, string $studio, string $genre, string $date)
    {
        parent::__construct($id, $titre, $image, $commandeEnCours, $public);
        $this->synopsis = $synopsis;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->studio = $studio;
        $this->genre = $genre;
        $this->date = $date;
    }

    /**
     * Accesseur de la propriété synopsis
     *
     * @return string
     */
    public function getStudio() : string {
        return $this->studio;
    }

    public function getGenre() : string {
        return $this->genre;
    }

    public function getDateSortie() : string {
        return $this->date;
    }

    public function getSynopsis() : string {
        return $this->synopsis;
    }

    /**
     * Accesseur de la propriété realisateur
     *
     * @return string
     */
    public function getRealisateur() : string {
        return $this->realisateur;
    }

    /**
     * Accesseur de la propriété duree
     *
     * @return integer
     */
    public function getDuree() : int {
        return $this->duree;
    }

}
?>