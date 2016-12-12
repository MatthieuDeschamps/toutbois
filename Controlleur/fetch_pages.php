<?php
require("../DAO/toutboisDAO.php");
require("../Vue/BodyCatalogue.php");


if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * 6);



//output results from database
$donnees=ToutboisDAO::affichageProduit($position,6);


afficheBodyCatalogue($donnees);
?>
