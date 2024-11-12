<?php

class Pagamento
{
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Método para obter os pagamentos pendentes de um associado
    public function obterPagamentosPendentes($associadoId) {
        $sql = "
            SELECT a.id, a.ano, a.valor, COALESCE(p.pago, FALSE) AS pago
            FROM Anuidades a
            LEFT JOIN Pagamentos p ON a.id = p.anuidade_id AND p.associado_id = :associado_id
            WHERE p.pago = FALSE
            ORDER BY a.ano ASC
        ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':associado_id' => $associadoId,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para registrar pagamento de uma anuidade específica
    public function registrarPagamento($associadoId, $anuidadeId) {
        $sql = "UPDATE pagamentos SET pago = TRUE, data_pagamento = CURRENT_DATE 
                WHERE associado_id = :associado_id AND anuidade_id = :anuidade_id";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':associado_id' => $associadoId,
            ':anuidade_id' => $anuidadeId
        ]);
        
        return $stmt->rowCount() > 0; // Retorna true se o pagamento foi registrado com sucesso
    }

    // Método para obter o status de pagamento de todas as anuidades do associado
    public function obterHistoricoPagamentos($associadoId) {
        $sql = "
            SELECT a.ano, a.valor, COALESCE(p.pago, FALSE) AS pago
            FROM Anuidades a
            LEFT JOIN Pagamentos p ON a.id = p.anuidade_id AND p.associado_id = :associado_id
            ORDER BY a.ano ASC
        ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':associado_id' => $associadoId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificaDevedor($associadoId) {
        $devedor = "Não deve anuidades";
        
        $sql = "SELECT id, pago FROM pagamentos WHERE associado_id = :associado_id;";
        $pagamentos_data = $this->conexao->prepare($sql);
        $pagamentos_data->execute([
            ":associado_id"=> $associadoId,
        ]);

        $pagamentos = $pagamentos_data->fetchAll(PDO::FETCH_ASSOC);
                    
        foreach ($pagamentos as $pagamento) {
            if (!$pagamento['pago']) {
                $devedor = "Deve anuidades";
            }
        }

        return $devedor;
    }

    public function obterPagamentos() {
        $sql = "SELECT * FROM pagamentos;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizaDevedores($associadoId, $anuidadeId) {
        $sql = "INSERT INTO Pagamentos (associado_id, anuidade_id) VALUES (:associado_id, :anuidade_id)
                ON CONFLICT (associado_id, anuidade_id) DO NOTHING";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':associado_id' => $associadoId,
            ':anuidade_id' => $anuidadeId
        ]);
    }
}
