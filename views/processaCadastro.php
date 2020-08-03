<?php
use cadastronis\entity\PessoaController;

$method = 'create';
if (isset($_POST['id'])) {
    if ($_POST['id'] == 'null') {
        $nome = $_POST['createPessoa'];
        $i = 'null';
    } else {
        $nome = $_POST['editPessoa'];
        $i = $_POST['id'];
        $method = 'edit';
    }

    require_once '../source/controller/pessoaController.php';
    $controller = new PessoaController();

    $resultGet = $controller->getByName($nome);

    if (mysqli_num_rows($resultGet) > 0) {
        header('location:../index.php?page=status&error');
    } else {
        $controller = new PessoaController();

        $nisOk = false;
        $nis = '';

        if ($method == 'create') {
            do {
                $nis = mt_rand(1, 99999999999); // max valor é 1.410.065.408
                echo $nis;
                if (strlen($nis) < 11) {
                    $zeros = 11 - strlen($nis);
                    for ($ii = 0; $ii < $zeros; $ii++) {
                        $nis = '0'.$nis;
                    }
                }
                echo '-'.$nis;
                $resultGet = $controller->getByNis($nis);
                if (mysqli_num_rows($resultGet) == 0) {
                    $nisOk = true;
                }
            } while ($nisOk == false);
            $controller = new PessoaController();
            try {
                $controller->inserir($nome, $nis);
                $resultGet = $controller->getByNis($nis);
                while($row = mysqli_fetch_array($resultGet)) {
                    $i = $row['id'];
                }
                header('location:../index.php?page=status&i='.$i.'&success');
            } catch (Exception $e) {
                write_log('Exception when create: '.$e);
                header('location:../index.php?page=status&exception');
            }
        } else {
            try {
                $editing = $controller->editar($nome, $i);
                header('location:../index.php?page=status&i='.$i.'&success');
            } catch (Exception $e) {
                write_log('Exception when edit: '.$e);
                header('location:../index.php?page=status&exception');
            }
        }
    }
} else {
    header('location:../index.php?page=status&error');
}

/**
 * Lógica para escrever em arquivo textos as exceções capturadas na aplicação para o devido tratamento.
 * @param $log_msg - Descreve a exceção capturada.
 * @return void
 */
function write_log($log_msg)
{
    $log_filename = "logs";
    if (!file_exists($log_filename)) {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/debug.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
