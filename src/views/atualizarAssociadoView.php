<?php
    ob_start();
?>

<div class="formContainer">
    <form action="" method="POST" class="myForm">

        <h1 class="title">Atualizar Associado</h1>

        <div class="formGroup">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($associado['nome']); ?>" required ><br><br>
        </div>

        <div class="formGroup">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($associado['email']); ?>" required ><br><br>
        </div>

        <div class="formGroup">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" value="<?php echo htmlspecialchars($associado['cpf']); ?>" required pattern="\d{11}" title="Digite apenas os 11 dígitos do CPF"><br><br>
        </div>
        
        <div class="formGroup">
            <label for="data_filiacao">Data de filiação</label>
            <input type="date" name="data_filiacao" value="<?php echo htmlspecialchars($associado['data_filiacao']); ?>" required><br><br>
        </div>

        <button type="submit" name="atualizar" class="formButton">Atualizar</button>
    </form>
</div>

<?php

    $content = ob_get_clean();

    if (isset($_POST['atualizar'])) {

        $associado = [
            'nome'=> $_POST['nome'],
            'email'=> $_POST['email'],
            'cpf'=> $_POST['cpf'],
            'data_filiacao'=> $_POST['data_filiacao'],
            'id'=> $associadoId,
        ];

        $controller->atualizarAssociado($associado);

        header('location: listaAssociados.php');
    }
