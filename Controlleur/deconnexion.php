<?php
    session_start();

    require('../DAO/toutboisDAO.php');

    session_destroy();

    header("location:index.php");
?>