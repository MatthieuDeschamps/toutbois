<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

        require('../../DAO/toutboisDAO.php');
        require('../../Vue/Head.php');
        require('../../Vue/Menu.php');
        require('../../Vue/Footer.php');
        require('../../Vue/AjoutProduitAdmin.php');

        $tva = ToutboisDAO::get_TVA();
        $typeProduit = ToutboisDAO::get_TypeProduit();
        
        
        afficheEntete(2);
        afficheMenu(2);
        afficheAjoutProduitAdmin($tva,$typeProduit);
        afficheFooter(2);
           
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>