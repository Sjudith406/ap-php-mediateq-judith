<?php

class Revue {
    private int $id;
    private string $titre; 
    private string $empruntable;
    private array $lesNumeros ;
    private string $type ; 
    private string $photo ;
    private string $period ;
    private string $description ;

    
    /**
     * Constructeur de la classe Revue
     *
     * @param integer $id
     * @param string $titre
     * @param string $empruntable
     */
    public function __construct(int $id, string $titre, string $empruntable, string $type, string $photo, string $period, string $description)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->empruntable = $empruntable;
        $this->type = $type;
        $this->photo = $photo;
        $this->period = $period;
        $this->description = $description;
    }

    /**
     * Accesseur de la propriété id
     *
     * @return integer
     */
    public function getId() : int {
        return $this->id;
    }

    public function getPhoto() : string {
        return $this->photo;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getPeriod() : string {
        return $this->period;
    }

    public function getType() : string {
        return $this->type;
    }
    /**
     * Accesseur de la propriété titre
     *
     * @return string
     */
    public function getTitre() : string {
        return $this->titre;
    }

    /**
     * Accesseur modifié de la propriété empruntable (renvoie vrai si il est à "O" et faux sinon)
     *
     * @return boolean
     */
    public function getEmpruntable() : bool {
        if ($this->empruntable == "O"){
            $value = true;
        } else {
            $value = false;
        }
        return $value;
    }

    /**
     * Accesseur de la propriété lesNumeros
     *
     * @return array
     */
    public function getLesNumeros() : array {
        return $this->lesNumeros;
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
     * Mutateur de la propriété lesNumeros
     *
     * @param array $lesNumeros
     * @return void
     */
    public function setlesNumeros(array $lesNumeros): void {
        $this->lesNumeros = $lesNumeros;
    }

    // a completer

}
?>