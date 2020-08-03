<?php
use cadastronis\entity\PessoaController;

if (isset($_GET['success'])) {
    $status ='success';
} else if (isset($_GET['error'])) {
    $status = 'error';
} else {
    $status = 'exception';
}
if (isset($_GET['i'])) {
    $i = $_GET['i'];
} else {
    $i = 'null';
}
?>
    <div class="dvData">
<?php
if ($status == 'success') {
    require_once 'source/controller/pessoaController.php';
    $controller = new PessoaController();
    $resultGet = $controller->getById($i);

    if (mysqli_num_rows($resultGet) > 0) {
        while($row = mysqli_fetch_array($resultGet)) {
            echo '<div>
                <span class="success">
                    Registro salvo com sucesso! 
                    <b>Nome: </b>'.$row['name'].'. <b>NIS:</b> '.$row['nis'].'.
                <span>
            </div>';
        }
    } else {
        echo '<div>
                <span class="warning">
                    Registro salvo com sucesso! Algum erro ocorreu ao tentar exibir os dados.
                <span>
            </div>';
    }
    echo '<div class="status"><a class="button" href="?page=home">Início</a></div>';
} else if ($status == 'error') {
    echo '<div>
            <span class="warning">
                Algum erro ocorreu ao tentar salvar. Verifique novamente os dados.
            <span>
        </div>
        <input class="btn_back" type="button" value="Voltar" onClick="JavaScript: window.history.back();">';
} else {
    echo '<div>
            <span class="warning">
                Ocorreu alguma excessão, por favor contate o administrador do sistema!
            <span>
        </div>
        <a class="button" href="?page=home">Início</a>';
}
?>
</div>
