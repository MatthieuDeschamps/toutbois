<?php  
        require('../Model/Produit.php');
        require('../Model/LigneCommande.php');
        require('../Model/Panier.php');
        session_start();
        if(isset($_SESSION['id'])) {

        require('../DAO/toutboisDAO.php');
        //require('../Vue/pagination.php');
        require('../Vue/Head.php');
        require('../Vue/Menu.php');
        require('../Vue/FooterPagination.php');
        require('../Vue/BodyCatalogue.php');

        $donnees = ToutboisDAO::get_produit();
        $pages= ToutboisDAO::getNombrePage();
        
        
        afficheEntete(1);
        afficheMenu(1);
        afficheBodyCatalogue($donnees);
        if(isset($_SESSION['panier'])){
            foreach ($_SESSION['panier']->getLigneDeCommande() as $value) {
                echo $value->getProduit()->getLibelleProduit().'<br />';
                echo $value->getQuantite().'<br />';
            }
            
         }
        afficheFooter($pages);           
        }
        else
        {
            header("location:../Controlleur/index.php");
        }
?>