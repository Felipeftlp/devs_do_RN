<?php
    ob_start();
?>

<div class="container">
    <h2 class="title">Checkout de Anuidades</h2>

    <div class="tableContainer">
        <?php if (count($anuidadesPendentes) > 0): ?>
            <table>
                <tr>
                    <th>Ano</th>
                    <th>Valor</th>
                    <th>Selecionar</th>
                </tr>
                <?php foreach ($anuidadesPendentes as $anuidade): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($anuidade['ano']); ?></td>
                        <td>R$ <?php echo number_format($anuidade['valor'], 2, ',', '.'); ?></td>
                        <td>
                            <input type="checkbox" name="teste[]" class="form-check-input" value="<?php echo $associadoId; ?>, <?php echo $anuidade['id']; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <strong>Total Devido: R$ <?php echo number_format($totalDevido, 2, ',', '.'); ?></strong>
                    </td>
                    <td>
                    </td>
                    <td>
                        <a href="checkout.php?associado_id=<?php echo $associadoId; ?>">
                            <button onclick="coletarCheckboxes()" class="formButton" >Pagar</button>
                        </a>
                    </td>
                </tr>
            </table>
        <?php else: ?>
            <p>O associado está em dia com todas as anuidades!</p>
        <?php endif; ?>
        <a href="listaAssociados.php" >
            <button class="backButton">
                Voltar
            </button>
        </a>
    </div>
</div>

<script>
    function coletarCheckboxes() {
        // Seleciona todos os checkboxes marcados
        const checkboxes = document.querySelectorAll('input[name="teste[]"]:checked');
        
        // Cria um array com os valores dos checkboxes selecionados
        const valoresSelecionados = Array.from(checkboxes).map(checkbox => checkbox.value);
        
        // Exibe os valores no console (ou use-os conforme necessário)
        console.log("Valores selecionados:", valoresSelecionados);

        // Enviar dados para o servidor (opcional)
        fetch('processaDados.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ opcoes: valoresSelecionados })
        })
        .then(response => response.json())
        .then(data => console.log("Resposta do servidor:", data))
        .catch(error => console.error("Erro:", error));
    }
</script>

<?php
    $content = ob_get_clean();
