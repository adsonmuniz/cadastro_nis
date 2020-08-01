<?php
    if (isset($_GET['i'])) {
        $i = $_GET['i'];
    } else {
        $i = 'null';
    }
    
    require_once 'source/controller/pessoaController.php';
    
    $controller = new PessoaController();
    ?>
        <div class="dvData">
    <?php
    if ($i == 'null') { // CREATE
        ?>
            <form method="post" action="?page=status">
                <input class="inputName" id="createPessoa" name="search_numNis" type="text" 
                placeHolder="DIGITE O NOME DA PESSOA" />
                <input type="submit" value="ADICIONAR" id="btn_add" class="button">
            </form>
        <?php
    } else { // EDIT
        $resultGet = $controller->getById($i);
        while($row = mysqli_fetch_array($resultGet))
        {
            echo '<form method="post" action="?page=status">
                        <input class="inputName" id="editPessoa" name="search_numNis" type="text" 
                        placeHolder="DIGITE O NOME DA PESSOA" value='.$row['name'].' />
                        <input type="submit" value="SALVAR" id="btn_add" class="button">
                    </form>';
        }
    }
    ?>
        <input class="btn_back" type="button" value="Voltar" onClick="JavaScript: window.history.back();">
    </div>