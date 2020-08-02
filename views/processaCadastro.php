<?php
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
            $controller->inserir($nome, $nis);
            header('location:../index.php?page=status&success');
        } else {
            $editing = $controller->editar($nome, $i);
            header('location:../index.php?page=status&success');
        }
    }
}
