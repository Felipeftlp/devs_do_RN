<?php
    ob_start();
?>

<div class="formContainer">
    <form action="cadastroAnuidade.php" method="POST" class="myForm">
        <h1 class="title">Cadastro de Anuidade</h1>

        <div class="formGroup">
            <label for="ano">Ano:</label>
            <input type="text" name="ano" id="ano" required><br><br>
        </div>

        <div class="formGroup">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" required><br><br>
        </div>

        <button type="submit" name="cadastrar" class="formButton">Cadastrar</button>
    </form>
</div>

<?php

    $content = ob_get_clean();

    if (isset($_POST['cadastrar'])) {

        $anuidade = [
            'ano'=> $_POST['ano'],
            'valor'=> $_POST['valor'],
        ];

        $controller->cadastrarAnuidade($anuidade);
    }

