<div class="formContainer">
    <form action="" method="POST" class="myForm" id="meuForm">
        <h1 class="title">Login</h1>

        <div class="formGroup">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" required><br><br>
        </div>
        
        <div class="formGroup">
            <label for="senha">Senha</label>
            <input type="password" name="senha" required><br><br>
        </div>
    
        <div id="liveAlertPlaceholder"></div>
        <button type="submit" name="login" class="formButton" id="liveAlertBtn">Login</button>
    </form>
</div>

<?php
    $loginFalhou = false;

    if (isset($_POST['login'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario == 'admin' && $senha == 'admin') {
            $_SESSION['logado'] = true;
            header('Location: cadastroAssociado.php');
            exit();
        } else {
            $loginFalhou = true;
        }
    }
?>

<script>
    // Função para exibir o alerta na página
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
    const appendAlert = (message, type) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('');
        alertPlaceholder.append(wrapper);
    };

    <?php if (isset($loginFalhou) && $loginFalhou): ?>
        appendAlert('Usuário ou senha incorretos', 'danger');
    <?php endif; ?>
</script>
