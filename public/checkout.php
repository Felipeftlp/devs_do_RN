<?php

try {
    require_once '../src/controllers/PagamentoController.php';
    require_once __DIR__ . '/../config/database.php';

    $associadoId = $_GET['associado_id'] ?? null;

    if (!$associadoId) {
        echo "Associado não especificado.";
        exit;
    }

    $controller = new PagamentoController($conexao);
    $resultado = $controller->checkoutAnuidades($associadoId);

    $anuidadesPendentes = $resultado['anuidadesPendentes'];
    $totalDevido = $resultado['totalDevido'];

    include '../src/views/pagamentoView.php';
    include 'base.php';


} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
