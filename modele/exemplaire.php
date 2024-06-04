<?php

class Exemplaire {
    private Document $document; 
    private int $numero;
    private string $dateAchat;
    private Rayon $rayon;
    private Etat $etat;
    
    /**
     * Constructeur de la classe Exemplaire
     *
     * @param integer $numero
     * @param Document $document
     * @param string $dateAchat
     * @param Rayon $rayon
     * @param Etat $etat
     */
    public function __construct(Document $document, int $numero, string $dateAchat, Rayon $rayon, Etat $etat)
    {
        $this->document = $document;
        $this->numero = $numero;
        $this->dateAchat = $dateAchat;
        $this->rayon = $rayon;
        $this->etat = $etat;
    }



    
    // a completer getter/setter
    
     /**
     * Accesseur de la propriété document
     *
     * @return Document
     */
    public function getDocument() : Document {
        return $this->document;
    }
     /**
     * Accesseur de la propriété dateAchat
     *
     * @return string
     */
    public function getDateAchat() : string {
        return $this->dateAchat;
    }

    /**
     * Accesseur de la propriété numero
     *
     * @return int
     */
    public function getNumero() : int {
        return $this->numero;
    }

    /**
     * Accesseur de la propriété etat
     *
     * @return string
     */
    public function getEtat() : string {
        return $this->etat->getTitre();
    }

    /**
     * Accesseur de la propriété libelle de la propriété rayon
     *
     * @return string
     */
    public function getLeRayon() : string {
        return $this->rayon->getLibelle();
    }

}
?>