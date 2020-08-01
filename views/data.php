<?php
        if (isset($_POST['search_numNis'])) {
            $p = $_POST['search_numNis'];
        } else {
            $p = 'null';
        }

        require_once '../source/controller/pessoaController.php';
        
        $controller = new PessoaController();

        if (strlen($p) < 11) {
            ?>
            <div>
                <span id="error_qtd_caracteres">Você precisa informar os 11 números<span>
                <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
            </div>
            <?php
        } else {
            $resultGet = $controller->getByNis($p);

            if ($resultGet) {
                ?>
                <?php
            } else {
                ?>
                <div>
                    <span id="not_found">NIS não existente!<span>
                    <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
                </div>
                <?php
            }
        }
?>
<!-- <h2>Adicionar Pasta</h2>
<form method="post" action="controller/folderController.php">
    <input type="text" id="nomePasta" name="nomePasta" placeholder="NOME DA PASTA">
    <input type="hidden" id="idPai" name="idPai" value="<?php echo($parent) ?>">
    
    <input type="submit" value="Ok">
    <input type="button" value="Cancelar" onClick="JavaScript: window.history.back();">
</form> -->