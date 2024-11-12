<?php

try {
    require_once '../src/controllers/AnuidadeController.php';
    require_once __DIR__ . '/../config/database.php';

    $anuidadeId = $_GET['anuidade_id'] ?? null;

    if (!$anuidadeId) {
        echo "Anuidade não especificada.";
        exit;
    }

    $controller = new AnuidadeController($conexao);
    $anuidade = $controller->obterAnuidade($anuidadeId);

    include '../src/views/atualizarAnuidadeView.php';
    include 'base.php';


} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
