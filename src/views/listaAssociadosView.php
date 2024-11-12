<?php
    ob_start();

    $associados = $associadoController->listarAssociado();
    $anuidades = $anuidadeController->listarAnuidade();
    $pagamentos = $pagamentoController->listaPagamentos();

    foreach ($anuidades as $anuidade) {
        foreach ($associados as $associado) {
            $anoFiliacao = (int)date('Y', strtotime($associado['data_filiacao']));
            $anoAnuidade = (int)$anuidade['ano'];
            $anoAtual = (int)date('Y');

            if ($anoAnuidade >= $anoFiliacao && $anoAnuidade <= $anoAtual) {
                $pagamentoController->atualizarDevedores($associado['id'], $anuidade['id']);
            }
        }
    }

?>

<div class="container">
    <h2 class="title">Lista de Associados</h2>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data de Filiação</th>
                <th>Estado de pagamentos</th>
                <th>Ações</th>
                <th></th>
            </tr>
            <?php foreach ($associados as $associado): 
                    $devedor = $pagamentoController->verificarDevedor($associado['id']);
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($associado['id']); ?></td>
                    <td><?php echo htmlspecialchars($associado['nome']); ?></td>
                    <td><?php echo htmlspecialchars($associado['email']); ?></td>
                    <td><?php echo htmlspecialchars($associado['cpf']); ?></td>
                    <td><?php echo htmlspecialchars($associado['data_filiacao']); ?></td>
                    <td><?php echo htmlspecialchars($devedor); ?></td>
                    <td>
                        <a href="atualizarAssociado.php?associado_id=<?php echo $associado['id']; ?>">
                            <button class="formButton">
                                Editar
                            </button>  
                        </a>  
                    </td>
                    <td>
                        <a href="checkout.php?associado_id=<?php echo $associado['id']; ?>">
                            <button class="formButton">
                                detalhar
                            </button>  
                        </a>  
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php
    $content = ob_get_clean();