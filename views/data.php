<?php
use cadastronis\entity\PessoaController;

    if (isset($_POST['search_numNis'])) {
        $p = $_POST['search_numNis'];
    } else {
        $p = 'null';
    }

    require_once 'source/controller/pessoaController.php';
    
    $controller = new PessoaController();
    ?>
    <div class="dvData">
    <?php
    if (strlen($p) < 11) {
        ?>
        <div>
            <span class="warning">Você precisa informar os 11 números<span>
        </div>
        <?php
    } else {
        $resultGet = $controller->getByNis($p);

        if (mysqli_num_rows($resultGet) > 0) {
            while($row = mysqli_fetch_array($resultGet)) {
                echo('<div class="item">
                    <span><b>Nome:</b> '.$row['name'].'.</span>
                    <span><b>NIS:</b> '.$row['nis'].'</span>
                    <a class="button" href="?page=form&i='.$row['id'].'">Editar</a>
                </div>');
            }
        } else {
            ?>
            <div>
                <span class="warning">Cidadão não encontrado!<span>
            </div>
            <?php
        }
    }
    ?>
        <input class="btn_back" type="button" value="Voltar" onClick="JavaScript: window.history.back();">
    </div>