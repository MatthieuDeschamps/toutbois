<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

        require('../../DAO/toutboisDAO.php');
        require('../../Vue/pagination.php');
        require('../../Vue/Head.php');
        require('../../Vue/Menu.php');
        require('../../Vue/Footer.php');
        require('../../Vue/CatalogueAdmin.php');

        $donnees = ToutboisDAO::get_produit();
        //$nbPage = ToutboisDAO::getNombrePage();
        
        afficheEntete(2);
        afficheMenu(2);
        afficheCatalogueAdmin($donnees);
        //afficherPagination($nbPage);
        afficheFooter(2);
           
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>