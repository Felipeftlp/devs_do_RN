<?php
    ob_start();
?>

<div class="formContainer">
    <form action="" method="POST" class="myForm">
        <h1 class="title">Atualizar Anuidade</h1>

        <div class="formGroup">
            <label for="ano">Ano:</label>
            <input type="text" name="ano" value="<?php echo htmlspecialchars($anuidade['ano']); ?>" required><br><br>
        </div>

        <div class="formGroup">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" value="<?php echo htmlspecialchars($anuidade['valor']); ?>" required><br><br>
        </div>

        <button type="submit" name="atualizar" class="formButton">Atualizar</button>
    </form>
</div>

<?php

    $content = ob_get_clean();

    if (isset($_POST['atualizar'])) {

        $anuidade = [
            'ano'=> $_POST['ano'],
            'valor'=> $_POST['valor'],
            'id'=> $anuidadeId,
        ];

        $controller->atualizarAnuidade($anuidade);

        header('location: listaAnuidades.php');
    }

