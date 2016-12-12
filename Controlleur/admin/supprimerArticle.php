<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

        require('../../DAO/toutboisDAO.php');
        require('../../Vue/Head.php');
        require('../../Vue/Menu.php');
        require('../../Vue/Footer.php');
        require('../../Vue/SupprimerProduitAdmin.php');

        $idProduit = htmlspecialchars($_GET['id']);
        $donnees = ToutboisDAO::get_produitById($idProduit);
        
        
        
        afficheEntete(2);
        afficheMenu(2);
        afficheSupprimerProduitAdmin($donnees);
        afficheFooter(2);
           
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>