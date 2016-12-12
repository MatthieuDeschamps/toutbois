<?php  
        require('../Model/Produit.php');
        require('../Model/LigneCommande.php');
        require('../Model/Panier.php');
        session_start();
        if(isset($_SESSION['id'])) {

        require('../DAO/toutboisDAO.php');
        require('../Vue/Head.php');
        require('../Vue/Menu.php');
        require('../Vue/BodyPanier.php');
        require('../Vue/Footer.php');
            
        afficheEntete(1);
        afficheMenu(1);
        afficheBodyPanier();
        afficheFooter(1);           
        }
        else
        {
            header("location:../Controlleur/index.php");
        }
?>
