<?php



    try {

        require_once __DIR__ . '/../config/database.php';
        require_once '../src/controllers/AssociadoController.php';
        
        $controller = new AssociadoController($conexao);

        include '../src/views/cadastroAssociadoView.php';

        include 'base.php';

    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }