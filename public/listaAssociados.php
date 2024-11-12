<?php

    try {

        require_once __DIR__ . '/../config/database.php';
        require_once '../src/controllers/AssociadoController.php';
        require_once '../src/controllers/AnuidadeController.php';
        require_once '../src/controllers/PagamentoController.php';
        
        $associadoController = new AssociadoController($conexao);
        $anuidadeController = new AnuidadeController($conexao);
        $pagamentoController = new PagamentoController($conexao);

        include '../src/views/listaAssociadosView.php';
        include 'base.php';


    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }