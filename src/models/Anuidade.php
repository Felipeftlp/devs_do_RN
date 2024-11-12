<?php

class Anuidade {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function cadastrarAnuidadeModel($dados) {
        $sql = "INSERT INTO anuidades (ano, valor) VALUES (:ano, :valor)
                ON CONFLICT (ano) DO NOTHING";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':ano' => $dados['ano'],
            ':valor' => $dados['valor'],
        ]);
    }

    public function obterAnuidadeModel($id) {
        $sql = "SELECT * FROM anuidades WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":id"=> $id,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarAnuidadeModel() {
        $stmt = $this->conexao->query("SELECT * FROM anuidades ORDER BY ano");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarAnuidadeModel($dados) {
        $sql = "UPDATE anuidades SET ano = :ano, valor = :valor WHERE id = :id;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":ano"=> $dados["ano"],
            ":valor"=> $dados["valor"],
            ":id" => $dados["id"],
        ]);

        return $stmt->rowCount();
    }

    public function excluirAnuidadeModel($id) {
        $sql = "DELETE FROM anuidades WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":id"=> $id,
        ]);

        return $stmt->rowCount();
    }
}