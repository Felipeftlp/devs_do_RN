<?php
    
    require_once '../models/Associado.php';
    
    class AssociadoController {
        private $associadoModel;

        public function __construct($conexao) {
            $this->associadoModel = new Associado($conexao);
        }

        public function cadastrarAssociado($dados) {
            $this->associadoModel->cadastrarAssociadoModel($dados);
        }

        public function obterAssociado($id) {
            return $this->associadoModel->obterAssociadoModel($id);
        }
    
        public function listarAssociado() {
            return $this->associadoModel->listarAssociadoModel();
        }
    
        public function atualizarAssociado($dados) {
            $this->associadoModel->atualizarAssociadoModel($dados);
        }
    
        public function excluirAssociado($id) {
            $this->associadoModel->excluirAssociadoModel($id);
        }
    }