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
    public function del($idProduit){
        $nbre=count($this->getLigneDeCommande());
        for($i=0;$i<$nbre;$i++){
            
            echo $idProduit;
            echo $this->getLigneDeCommande()[$i]->getProduit()->getCodeProduit();
            if($this->getLigneDeCommande()[$i]->getProduit()->getCodeProduit() == $idProduit ){
                
                print_r($_SESSION['panier']->getLigneDeCommande()[$i]);
                $this->getLigneDeCommande()[$i]->bombeAtomique();
                
                
            }
        }
        /*foreach ($this->getLigneDeCommande() as $value) {
            echo 'Salut lees petits';
          
            
            if($value->getProduit()->getCodeProduit() == $idProduit ){
               
               $value=NULL;
                var_dump($value);
            }
            
        }*/
    }
    
    
    
}
?>

