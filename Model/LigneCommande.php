<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LigneCommande
 *
 * @author Dev
 */
class LigneCommande {

    private $produit;
    private $quantite;
    

    public function getProduit() {
        return $this->produit;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setProduit($produit) {
        $this->produit = $produit;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function calculerPrixTTC() {
        return $this->getProduit()->getPrixProduit()*$this->getQuantite()*(1+($this->produit->getTVAProduit())/100);
    }
    
    public function calculerPrixHT() {
        return $this->getProduit()->getPrixProduit()*$this->getQuantite();
    }
    
    public function calculerTVA() {
        return $this->getProduit()->getTVAProduit()*$this->getQuantite()*$this->getProduit()->getPrixProduit()/100;
    }
    
}
