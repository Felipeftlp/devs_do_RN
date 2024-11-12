<?php
    ob_start();
?>

<div class="formContainer">
    <form action="cadastroAssociado.php" method="POST" class="myForm">

        <h1 class="title">Cadastro de Associado</h1>

        <div class="formGroup">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required ><br><br>
        </div>

        <div class="formGroup">
            <label for="email">Email:</label>
            <input type="email" name="email" required ><br><br>
        </div>

        <div class="formGroup">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required pattern="\d{11}" title="Digite apenas os 11 dígitos do CPF"><br><br>
        </div>
        
        <div class="formGroup">
            <label for="data_filiacao">Data de filiação</label>
            <input type="date" name="data_filiacao" required><br><br>
        </div>

        <button type="submit" name="cadastrar" class="formButton" >Cadastrar</button>
    </form>
</div>

<?php

    $content = ob_get_clean();

    if (isset($_POST['cadastrar'])) {

        $associado = [
            'nome'=> $_POST['nome'],
            'email'=> $_POST['email'],
            'cpf'=> $_POST['cpf'],
            'data_filiacao'=> $_POST['data_filiacao'],
        ];

        $controller->cadastrarAssociado($associado);
    }
