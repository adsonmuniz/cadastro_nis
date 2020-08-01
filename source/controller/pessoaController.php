<?php
if (isset($_POST['createPessoa']) || isset($_POST['editPessoa'])) {
    require_once '../source/model/pessoa.php';
} else {
    require_once 'source/model/pessoa.php';
}
  
class PessoaController
{
    public function listar()
    {
        $pessoa = new Pessoa();
        $pessoas = $pessoa->listAll();
        return $pessoas;
    }

    public function getById($p)
    {
        $pessoa = new Pessoa();
        $pessoa->setId(addslashes($p));

        return $pessoa->getById();
    }

    public function getByName($p)
    {
        $pessoa = new Pessoa();
        $pessoa->setName(addslashes($p));

        return $pessoa->getByName();
    }

    public function getByNis($p)
    {
        $pessoa = new Pessoa();
        $pessoa->setNis(addslashes($p));

        return $pessoa->getByNis();
    }

    public function inserir()
    {
        $pessoa = new Pessoa();
        $p = addslashes($_POST['nomePessoa']);
        $n = $_POST['numeroNis'];

        $pessoa->setName(addslashes($p));
        $pessoa->setNis($n);

        $result = $pessoa->save();
        return $result;
    }

    public function editar()
    {
        $pessoa = new Pessoa();
        $p = addslashes($_POST['editPessoa']);
        $i = $_POST['idPessoa'];

        $pessoa->setName($p);
        $pessoa->setId($i);

        $pessoa = $pessoa->update();
        return $result;

    }
}

$classPessoaController = new PessoaController();

if (isset($_POST['nomePessoa'])) {
    $n = $_POST['numeroNis'];
    $obj = $classPessoaController->inserir();
    
    if ($n == 'null' || $ip == 0) {
        header('location:../index.php?page=home');
    } else {
        //header('location:../index.php?page=child&p='.$ip);
    }
} else if (isset($_POST['editPessoa'])) {
    $id = $_POST['idPessoa'];
    $obj = $classPessoaController->editar();
    if ($ip == 'null' || $ip == 0) {
        header('location:../index.php?page=home');
    } else {
        //header('location:../index.php?page=child&p='.$ip);
    }
}
