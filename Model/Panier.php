<?php

class Panier {
    private $ligneDeCommande=array();
    public function getLigneDeCommande() {
        return $this->ligneDeCommande;
    }

    public function setLigneDeCommande($ligneDeCommande) {
        $this->ligneDeCommande = $ligneDeCommande;
    }
    
    public function ajoutLigneDeCommande($ligneDeCommande) {
        array_push($this->ligneDeCommande, $ligneDeCommande);
    }

    public function totalCommandeTTC(){
       $total=0; 
        foreach ($this->getLigneDeCommande() as $value) {
            $total+=$value->calculerPrixTTC();
        }
        return $total;
    }
    
    public function totalCommandeHT(){
       $total=0; 
        foreach ($this->getLigneDeCommande() as $value) {
            $total+=$value->calculerPrixHT();
        }
        return $total;
    }
    
    public function totalTVA(){
       $total=0; 
        foreach ($this->getLigneDeCommande() as $value) {
            $total+=$value->calculerTVA();
        }
        return $total;
    }
    public static function suppressionLigneDeCommande($idProduit,$lignedecommande){
        $nbre=count($lignedecommande);
        for($i=0;$i<$nbre;$i++){
            
            if($lignedecommande[$i]->getProduit()->getCodeProduit() == $idProduit ){
              
                unset($lignedecommande[$i]);    
            }
        }
        $lignedecommandeReindexe=array_values($lignedecommande);
        return $lignedecommandeReindexe;
       
    }
    
    
    
}
?>

