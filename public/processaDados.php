<?php

require_once '../src/controllers/PagamentoController.php';
require_once __DIR__ . '/../config/database.php';

$controller = new PagamentoController($conexao);

// Recebe os dados JSON enviados pelo JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Verifica se os dados foram enviados corretamente
if (isset($data['opcoes'])) {
    $opcoesSelecionadas = $data['opcoes'];
    foreach ($opcoesSelecionadas as $opcao) {
        $associadoId = $opcao[0];
        $anuidadeId = $opcao[3];

        $controller->processarPagamento($associadoId, $anuidadeId);
    }
} else {
    echo "Nenhuma opção selecionada.";
}
