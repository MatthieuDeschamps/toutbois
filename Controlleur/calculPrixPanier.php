<?php  
        require('../Model/Produit.php');
        require('../Model/LigneCommande.php');
        require('../Model/Panier.php');
        session_start();
        require('../DAO/toutboisDAO.php');
        
        if(isset($_SESSION['id'])) {

            for ($i=0;$i<count($_SESSION['panier']->getLigneDeCommande());$i++){
                
                $quantite=$_POST[$_SESSION['panier']->getLigneDeCommande()[$i]->getProduit()->getCodeProduit()];
                $_SESSION['panier']->getLigneDeCommande()[$i]->setQuantite($quantite);
            }
            
            header("location:../Controlleur/panier.php");
      
        }
        else
        {
            header("location:../Controlleur/index.php");
        }
?>