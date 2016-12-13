<?php

class Panier {
    private $ligneDeCommande=array();
    public function getLigneDeCommande() {
        return $this->ligneDeCommande;
    }

    public function setLigneDeCommande($ligneDeCommande) {
        array_push($this->ligneDeCommande, $ligneDeCommande);
    }

    public function totalCommandeTTC(){
       $total=0; 
        foreach ($this->getLigneDeCommande() as $value) {
            $total+=$value->calculerPrixTTC();
        }
        return $total;
    }
}
?>

