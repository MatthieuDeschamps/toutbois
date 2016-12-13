<?php

require ("../Model/Produit.php");
require("../DAO/toutboisDAO.php");

$json = array('error' => true);

if(isset($_GET['codeProduit'])){
        $product=ToutboisDAO::get_produitById($_GET['codeProduit']);
	//$product = $DB->query('SELECT codeProduit FROM produit WHERE codeProduit=:codeProduit', array('codeProduit' => $_GET['codeProduit']));

	if(empty($product)){
		$json['message'] = "Ce produit n'existe pas";
	}else{

		$panier->addPanier($product[0]);
		$json['error']  = false;
		//$json['total']  = number_format($panier->total(),2,',',' ');
		//$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
}
echo json_encode($json);
?>