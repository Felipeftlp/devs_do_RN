<?php

require_once '/home/felipe/projetos-pessoais/devsRN/src/models/Pagamento.php';

class PagamentoController {
    private $pagamentoModel;

    public function __construct($conexao) {
        $this->pagamentoModel = new Pagamento($conexao);
    }

    // Exibe as anuidades pendentes de um associado para o checkout
    public function checkoutAnuidades($associadoId) {
        $anuidadesPendentes = $this->pagamentoModel->obterPagamentosPendentes($associadoId);

        $totalDevido = 0;
        foreach ($anuidadesPendentes as $anuidade) {
            $totalDevido += $anuidade['valor'];
        }

        return [
            'anuidadesPendentes' => $anuidadesPendentes,
            'totalDevido' => $totalDevido
        ];
    }

    // Processa o pagamento de uma anuidade selecionada
    public function processarPagamento($associadoId, $anuidadeId) {
        $sucesso = $this->pagamentoModel->registrarPagamento($associadoId, $anuidadeId);

        return $sucesso ? "Pagamento registrado com sucesso." : "Erro ao registrar pagamento.";
    }

    // Exibe o histórico de pagamentos do associado
    public function exibirHistoricoPagamentos($associadoId) {
        return $this->pagamentoModel->obterHistoricoPagamentos($associadoId);
    }

    public function verificarDevedor($associadoId) {
        return $this->pagamentoModel->verificaDevedor($associadoId);
    }

    public function listaPagamentos() {
        return $this->pagamentoModel->obterPagamentos();
    }

    public function atualizarDevedores($associadoId, $anuidadeId) {
        $this->pagamentoModel->atualizaDevedores($associadoId, $anuidadeId);
    }
}
