<?php

class ToutboisDAO {

    private static function connectionBDDToutbois() {

        $host = 'localhost';
        $bdd = 'toutboisTest';
        $utilisateur = 'root';
        $motDePasse = '';

        try {
            $mysqlPDO = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8", $utilisateur, $motDePasse, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
        }

        return $mysqlPDO;
    }

    private static function deconnectionBDD($mysqlPDO) {
        unset($mysqlPDO);
    }


    public static function commandeEnCours() {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT prod.codeProduit, prod.libelleProduit, prod.stockProduit, prod.prixUnitaireProduit, prod.remiseProduit, prod.remiseProduit, prod.description, prod.image, tva.tauxTVA, tp.libelleTypeProduit, prod.id_TVA, prod.Id_typeProduit 
        FROM produit as prod 
        INNER JOIN tva on prod.id_TVA = tva.id_TVA 
        INNER JOIN type_produit as tp on prod.Id_typeProduit = tp.Id_typeProduit
        WHERE prod.codeProduit = " . $id);
        $statement->execute();

        $donnees = $statement->fetch();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

    public static function identificationMembre($login, $mdp) {
        $bdd = ToutboisDAO::connectionBDDToutbois();

        $statement = $bdd->prepare('SELECT COUNT(*) FROM login WHERE numeroClient = ? AND password = ?');
        $statement->execute(array($login, $mdp));
        $donnees = $statement->fetch();
        //print_r($donnees);
        ToutboisDAO::deconnectionBDD($bdd);
        if (isset($donnees) AND $donnees[0] > 0) {
            return true;
        }

        return false;
    }

    /* Afficher un produit */

    public static function get_produit() {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT prod.codeProduit, prod.libelleProduit, prod.stockProduit, prod.prixUnitaireProduit, prod.remiseProduit, prod.remiseProduit, prod.description, prod.image, tva.tauxTVA, tp.libelleTypeProduit 
        FROM produit as prod 
        INNER JOIN tva on prod.id_TVA = tva.id_TVA 
        INNER JOIN type_produit as tp on prod.Id_typeProduit = tp.Id_typeProduit");
        $statement->execute();

        $donnees = $statement->fetchAll();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

    /* Afficher un produit grâce à l'ID */

    public static function get_produitById($id) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT prod.codeProduit, prod.libelleProduit, prod.stockProduit, prod.prixUnitaireProduit, prod.remiseProduit, prod.remiseProduit, prod.description, prod.image, tva.tauxTVA, tp.libelleTypeProduit, prod.id_TVA, prod.Id_typeProduit 
        FROM produit as prod 
        INNER JOIN tva on prod.id_TVA = tva.id_TVA 
        INNER JOIN type_produit as tp on prod.Id_typeProduit = tp.Id_typeProduit
        WHERE prod.codeProduit = " . $id);
        $statement->execute();

        $donnees = $statement->fetch();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }
    // retourne une liste de produit correspondant à l'Id type_produit passé en paramêtre
    public static function get_produitByType($type) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT codeProduit, libelleProduit, 
            stockProduit, prixUnitaireProduit, remiseProduit, 
            remiseProduit, description, Image, 
            Id_typeProduit 
        FROM produit 
        WHERE Id_typeProduit = " . $type);
        $statement->execute();

        $donnees = $statement->fetchAll();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

    public static function get_TypeProduit() {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT Id_typeProduit, libelleTypeProduit FROM type_produit");
        $statement->execute();

        $donnees = $statement->fetchAll();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

    public static function get_TVA() {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT id_TVA, tauxTVA FROM tva");
        $statement->execute();

        $donnees = $statement->fetchAll();

        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

    public static function getNombrePageParTypeProduit($idType) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT COUNT(*) FROM produit WHERE Id_typeProduit = " . $idType);
        $statement->execute();

        $resultatRequete = $statement->fetch();
        $nbPage = ceil($resultatRequete[0] / 6);

        ToutboisDAO::deconnectionBDD($bdd);

        return $nbPage;
    }

    public static function getNombrePage() {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT COUNT(*) FROM produit");
        $statement->execute();

        $resultatRequete = $statement->fetch();
        $nbPage = ceil($resultatRequete[0] / 6);

        ToutboisDAO::deconnectionBDD($bdd);

        return $nbPage;
    }

    public static function getCommande($numeroClient) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("SELECT id_commande AS 'numero commande',dateCommande,dateLivraisonCommande, 
            libelle_EtatCommande,SUM(quantite*prixUnitaireProduit) AS'total', numeroClient
            FROM commandes
            INNER JOIN contenir ON commandes.id_commande=contenir.id_commande_contenir 
            INNER JOIN etatcommande ON commandes.id_EtatCommande=etatcommande.id_EtatCommande
            INNER JOIN produit ON contenir.codeProduit_contenir=produit.codeProduit 
            GROUP BY id_commande
            HAVING numeroClient = :numeroClient ");
        
        $statement->bindParam(':numeroClient',$numeroClient);
        $statement->execute();
        $resultatRequete = $statement->fetchAll();
        
         ToutboisDAO::deconnectionBDD($bdd);
         return $resultatRequete;
        
    }
    //prend en paramêtre un objet de type panier et le numéro de client puis entre la commande dans la base de données
    public static function insertCommande($panier,$numeroClient) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("INSERT INTO commandes (dateCommande, numeroClient, id_EtatCommande)"
                . " VALUES (NOW(), :numeroClient, 1)");
        
        $statement->bindParam(':numeroClient',$numeroClient);
        //$statement->bindParam(':idEtatCommande',2);
        $statement->execute();
        
        $idcommande=$bdd->lastInsertId();
        
        foreach ($panier->getLigneDeCommande() as $ligneDeCommande){
        $statement = $bdd->prepare("INSERT INTO contenir (quantite, id_commande_contenir, codeProduit_contenir)"
                . " VALUES (:quantite, :id_commande_contenir, :codeProduit_contenir)");
        $statement->bindParam(':quantite',$ligneDeCommande->getQuantite());
        $statement->bindParam(':id_commande_contenir',$idcommande);
        $statement->bindParam(':codeProduit_contenir',$ligneDeCommande->getProduit()->getCodeProduit());
        $statement->execute();
        }
        
         ToutboisDAO::deconnectionBDD($bdd);      
    }
    
    

    public static function updateProduit($produit) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("UPDATE produit 
        SET libelleProduit = :libelleProduit, 
            stockProduit = :stockProduit, 
            prixUnitaireProduit = :prixUnitaireProduit,  
            remiseProduit = :remiseProduit,
            description = :description,
            Image = :Image,
            id_TVA = :id_TVA,
            Id_typeProduit = :Id_typeProduit  
            WHERE codeProduit = :codeProduit");
        
        $statement->bindParam(':libelleProduit', $produit->getLibelleProduit());
        $statement->bindParam(':stockProduit', $produit->getStock());
        $statement->bindParam(':prixUnitaireProduit', $produit->getPrixProduit());
        $statement->bindParam(':remiseProduit', $produit->getRemiseProduit());
        $statement->bindParam(':description', $produit->getDescriptionProduit());
        $statement->bindParam(':Image', $produit->getLienImageProduit());
        $statement->bindParam(':id_TVA', $produit->getTVAProduit());
        $statement->bindParam(':Id_typeProduit', $produit->getTypeProduit());
        $statement->bindParam(':codeProduit', $produit->getCodeProduit());
        
        $statement->execute();
        
        ToutboisDAO::deconnectionBDD($bdd);
    }

    public static function deleteProduit($produit) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare("DELETE FROM produit WHERE codeProduit =  :codeProduit");


        $statement->bindParam(':codeProduit', $produit->getCodeProduit());


        $statement->execute();



        ToutboisDAO::deconnectionBDD($bdd);
    }

    public static function insertProduit($produit) {

        Try {

            $bdd = ToutboisDAO::connectionBDDToutbois();
            $statement = $bdd->prepare("INSERT INTO produit (libelleProduit, stockProduit, prixUnitaireProduit, remiseProduit, description, Image, id_TVA, Id_typeProduit) VALUES (:libelleProduit, :stockProduit, :prixUnitaireProduit, :remiseProduit, :description, :Image, :id_TVA, :Id_typeProduit)");

            $statement->bindParam(':libelleProduit', $produit->getLibelleProduit());
            $statement->bindParam(':stockProduit', $produit->getStock());
            $statement->bindParam(':prixUnitaireProduit', $produit->getPrixProduit());
            $statement->bindParam(':remiseProduit', $produit->getRemiseProduit());
            $statement->bindParam(':description', $produit->getDescriptionProduit());
            $statement->bindParam(':Image', $produit->getLienImageProduit());
            $statement->bindParam(':id_TVA', $produit->getTVAProduit());
            $statement->bindParam(':Id_typeProduit', $produit->getTypeProduit());



            $statement->execute();
        } catch (Exception $e) {
            die('<h1>Erreur de requête insert : </h1>' . $e->getMessage());
        }




        ToutboisDAO::deconnectionBDD($bdd);
    }

    public static function affichageProduit($position, $objetParPage) {
        $bdd = ToutboisDAO::connectionBDDToutbois();
        $statement = $bdd->prepare('SELECT codeProduit, libelleProduit, stockProduit, '
                . 'prixUnitaireProduit, remiseProduit, description,Image '
                . 'FROM produit LIMIT ' . $position . ', ' . $objetParPage);
        $statement->execute();
        $donnees = $statement->fetchAll();
        ToutboisDAO::deconnectionBDD($bdd);
        return $donnees;
    }

}

?>