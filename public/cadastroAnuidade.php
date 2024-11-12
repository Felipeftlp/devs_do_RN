<?php

    try {

        require_once __DIR__ . '/../config/database.php';
        require_once '../src/controllers/AnuidadeController.php';
        
        $controller = new AnuidadeController($conexao);

        include '../src/views/cadastroAnuidadeView.php';
        include 'base.php';


    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }