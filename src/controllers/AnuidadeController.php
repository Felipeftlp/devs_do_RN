<?php
    
    require_once '../models/Anuidade.php';
    
    class AnuidadeController {
        private $anuidadeModel;

        public function __construct($conexao) {
            $this->anuidadeModel = new Anuidade($conexao);
        }

        public function cadastrarAnuidade($dados) {
            $this->anuidadeModel->cadastrarAnuidadeModel($dados);
        }

        public function obterAnuidade($id) {
            return $this->anuidadeModel->obterAnuidadeModel($id);
        }
    
        public function listarAnuidade() {
            return $this->anuidadeModel->listarAnuidadeModel();
        }
    
        public function atualizarAnuidade($dados) {
            $this->anuidadeModel->atualizarAnuidadeModel($dados);
        }
    
        public function excluirAnuidade($id) {
            $this->anuidadeModel->excluirAnuidadeModel($id);
        }
    }