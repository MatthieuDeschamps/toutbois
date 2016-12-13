<?php  
        session_start();
        if(isset($_SESSION['id'])) {

        require('../DAO/toutboisDAO.php');
        //require('../Vue/pagination.php');
        require('../Vue/Head.php');
        require('../Vue/Menu.php');
        require('../Vue/FooterPagination.php');
        require('../Vue/BodyPanier.php');

        $donnees = ToutboisDAO::get_produit();
        $pages= ToutboisDAO::getNombrePage();
            
        afficheEntete(1);
        afficheMenu(1);
        afficheBodyCatalogue($donnees);

        //afficherPagination($nbPage);
        afficheFooter($pages);           
        }
        else
        {
            header("location:../Controlleur/index.php");
        }
?>