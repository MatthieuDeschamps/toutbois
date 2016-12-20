<?php 
class Produit{
   
    private $codeProduit;
    private $libelleProduit;
    private $stock;
    private $prixProduit;
    private $remiseProduit;
    private $descriptionProduit;
    private $lienImageProduit;
    private $tvaProduit;
    private $typeProduit;
    
    public function setCodeProduit($codeProduit)
    {
        $this->codeProduit = $codeProduit;
    }
    
    public function setLibelleProduit($libelleProduit)
    {
        $this->libelleProduit = $libelleProduit;
    }
    
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    
    public function setPrixProduit($prixProduit)
    {
        $this->prixProduit = $prixProduit;
    }
    
    public function setRemiseProduit($remiseProduit)
    {
        $this->remiseProduit = $remiseProduit;
    }
    
    public function setDescriptionProduit($descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;
    }
    
    public function setLienImageProduit($lienImageProduit)
    {
        $this->lienImageProduit = $lienImageProduit;
    }
    
    public function setTVAProduit($tvaProduit)
    {
        $this->tvaProduit = $tvaProduit;
    }
    
    public function setTypeProduit($typeProduit)
    {
        $this->typeProduit = $typeProduit;
    }
    
    public function getCodeProduit()
    {
        return $this->codeProduit;
    }
    
    public function getLibelleProduit()
    {
        return $this->libelleProduit;
    }
    
    public function getStock()
    {
        return $this->stock;
    }
    
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }
    
    public function getRemiseProduit()
    {
        return $this->remiseProduit;
    }
    
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }
    
    public function getLienImageProduit()
    {
        return $this->lienImageProduit;
    }
    
    public function getTVAProduit()
    {
        return $this->tvaProduit;
    }
    
    public function getTypeProduit()
    {
        return $this->typeProduit;
    }
    
    public function __toString() {
        return $this->codeProduit;
    }
}

?>