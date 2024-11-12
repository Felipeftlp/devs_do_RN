<?php

class Associado {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function cadastrarAssociadoModel($dados) {
        $sql = "INSERT INTO associados (nome, email, cpf, data_filiacao) VALUES (:nome, :email, :cpf, :data_filiacao)
                ON CONFLICT (cpf) DO NOTHING;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':nome' => $dados['nome'],
            ':email' => $dados['email'],
            ':cpf' => $dados['cpf'],
            ':data_filiacao'=> $dados['data_filiacao'],
        ]);
    }

    public function obterAssociadoModel($id) {
        $sql = "SELECT * FROM associados WHERE id = :id;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":id"=> $id,
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarAssociadoModel() {
        $stmt = $this->conexao->query("SELECT * FROM associados ORDER BY id");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarAssociadoModel($dados) {
        $sql = "UPDATE associados SET nome = :nome, email = :email, cpf = :cpf, data_filiacao = :data_filiacao WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":nome"=> $dados["nome"],
            ":email"=> $dados["email"],
            ":cpf"=> $dados["cpf"],
            ":data_filiacao"=> $dados["data_filiacao"],
            ":id"=> $dados["id"],
        ]);

        return $stmt->rowCount();
    }

    public function excluirAssociadoModel($id) {
        $sql = "DELETE FROM associados WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ":id"=> $id,
        ]);

        return $stmt->rowCount();
    }
}