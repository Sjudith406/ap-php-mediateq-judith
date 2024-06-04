<?php 

class Emprunts {
    private Abonnee $abonne;
    private Exemplaire $exemplaire;
    private string $dateDebut;
    private string $dateFin;
    private string $lieu;
    private string $rendu;
    private string $prolongeable;
    

    // Constructeur
    public function __construct(Abonnee $abonne, Exemplaire $exemplaire, string $dateDebut, string $dateFin, string $lieu, string $rendu, string $prolongeable) {
        $this->abonne = $abonne;
        $this->exemplaire = $exemplaire;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->lieu = $lieu;
        $this->rendu = $rendu; 
        $this->prolongeable = $prolongeable;
    }

     /**
     * Accesseur de la propriété idAbonne
     *
     * @return Abonnee
     */
    public function getAbonne() : Abonnee {
        return $this->abonne;
    }

    /**
     * Accesseur de la propriété idDoc
     *
     * @return Exemplaire
     */
    public function getExemplaire() : Exemplaire {
        return $this->exemplaire;
    }


    /**
     * Accesseur de la propriété dateDebut
     *
     * @return string
     */
    public function getDateDebut() : string {
        return $this->dateDebut;
    }
    
    /**
     * Accesseur de la propriété dateFin
     *
     * @return string
     */
    public function getDateFin() : string {
        return $this->dateFin;
    }

    /**
     * Accesseur de la propriété lieu
     *
     * @return string
     */
    public function getLieu() : string {
        return $this->lieu;
    }
    
    /**
     * Accesseur de la propriété rendu
     *
     * @return bool
     */
    public function getRendu() : bool {
        if ($this->rendu == "O"){
            $value = true;
        } else {
            $value = false;
        }
        return $value;
    }

    /**
     * Accesseur de la propriété prolongeable
     *
     * @return bool
     */
    public function getProlongeable() : bool {
        if ($this->prolongeable == "O"){
            $value = true;
        } else {
            $value = false;
        }
        return $value;
    }

    /**
     * 
     * 
     * @return
     */
    public function prolonger() {
        // Logique pour prolonger l'emprunt
        // ...
    }
    
    /**
     * 
     * 
     * @return
     */
     public function estEnRetard() {
        // Logique pour vérifier si l'emprunt est en retard
        // ...
    }

}
?>