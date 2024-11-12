<?php 
    session_start();
    $_SESSION['logado'] = false;
    header('location:index.php');

    error_log(print_r($_SESSION['logado'],true));
