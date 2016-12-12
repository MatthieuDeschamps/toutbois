<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

        require('../../DAO/toutboisDAO.php');
        require('../../Vue/Head.php');
        require('../../Vue/Menu.php');
        require('../../Vue/Footer.php');
        require('../../Vue/ModifProduitAdmin.php');

        $idProduit = htmlspecialchars($_GET['id']);
        $donnees = ToutboisDAO::get_produitById($idProduit);
        $tva = ToutboisDAO::get_TVA();
        $typeProduit = ToutboisDAO::get_TypeProduit();
        
        
        afficheEntete(2);
        afficheMenu(2);
        afficheModifProduitAdmin($donnees,$tva,$typeProduit);
        afficheFooter(2);
           
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>