<?php

    try {

        require_once __DIR__ . '/../config/database.php';
        require_once '../src/controllers/AnuidadeController.php';
        
        $anuidadeController = new AnuidadeController($conexao);

        include '../src/views/listaAnuidadesView.php';
        include 'base.php';


    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }