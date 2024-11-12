<?php

try {
    require_once '../src/controllers/AssociadoController.php';
    require_once __DIR__ . '/../config/database.php';

    $associadoId = $_GET['associado_id'] ?? null;

    if (!$associadoId) {
        echo "Associado não especificada.";
        exit;
    }

    $controller = new AssociadoController($conexao);
    $associado = $controller->obterAssociado($associadoId);

    include '../src/views/atualizarAssociadoView.php';
    include 'base.php';

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
