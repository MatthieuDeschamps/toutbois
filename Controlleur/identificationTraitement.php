<?php
    session_start();

    require('../DAO/toutboisDAO.php');

    $login=htmlspecialchars($_POST['login']);
    $mdp=htmlspecialchars($_POST['motDePasse']);
    
    if(ToutboisDAO::identificationMembre($login,$mdp))
    {
        $_SESSION['id'] = $login;
        $_SESSION['admin'] = 0;
        header("location:catalogue.php");
    }
    else if ($login === 'admin' && $mdp === 'admin')
    {
        $_SESSION['id'] = $login;
        $_SESSION['admin'] = 1;
        header("location:catalogue.php");
    }
    else
    {
        header("location:../Controlleur/identification.php");
    }
?>