<?php
    ob_start();

    $anuidades = $anuidadeController->listarAnuidade();

?>

<div class="container">
    <h2 class="title">Lista de Anuidades</h2>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>ano</th>
                <th>valor</th>
                <th>Ações</th>
                <th></th>
            </tr>
            <?php foreach ($anuidades as $anuidade): ?>
                <tr>
                    <td><?php echo htmlspecialchars($anuidade['id']); ?></td>
                    <td><?php echo htmlspecialchars($anuidade['ano']); ?></td>
                    <td>R$ <?php echo htmlspecialchars($anuidade['valor']); ?></td>
                    <td>
                        <a href="atualizarAnuidade.php?anuidade_id=<?php echo $anuidade['id']; ?>">
                            <button class="formButton">
                                Editar
                            </button>  
                        </a>  
                    </td>
                    <td>
                        <a href="deletarAnuidade.php?anuidade_id=<?php echo $anuidade['id']; ?>">
                            <button class="deleteButton">
                                Excluir
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