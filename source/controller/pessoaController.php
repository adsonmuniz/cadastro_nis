<?php
if (isset($_POST['createPessoa']) || isset($_POST['editPessoa']) || isset($_POST['id'])) {
    require_once '../source/model/pessoa.php';
} else {
    require_once 'source/model/pessoa.php';
}

/**
 * Classe para comunicação entre front e back-end para objeto Pessoa
 */
class PessoaController
{
    /**
     * Lógica para listar todas as pessoas cadastradas
     * @return array[Pessoa]
     */
    public function listar()
    {
        $pessoa = new Pessoa();
        $pessoas = $pessoa->listAll();
        return $pessoas;
    }

    /**
     * Lógica para listar a Pessoa a partir do id
     * @param integer $i - Valor do atributo id a ser procurado.
     * @return Pessoa
     */
    public function getById($i)
    {
        $pessoa = new Pessoa();
        $pessoa->setId(addslashes($i));

        return $pessoa->getById();
    }

    /**
     * Lógica para listar a Pessoa a partir do nome
     * @param string $n - Valor do atributo name a ser procurado.
     * @return Pessoa
     */
    public function getByName($n)
    {
        $pessoa = new Pessoa();
        $pessoa->setName(addslashes($n));

        return $pessoa->getByName();
    }

    /**
     * Lógica para listar a Pessoa a partir do NIS
     * @param string $n - Valor do atributo NIS a ser procurado.
     * @return Pessoa
     */
    public function getByNis($n)
    {
        $pessoa = new Pessoa();
        $pessoa->setNis(addslashes($n));

        return $pessoa->getByNis();
    }

    /**
     * Lógica para salvar a Pessoa na tabela pessoa no banco de dados
     * @param string $n - É necessário informar o valor do atributo name.
     * @param string $nis - É necessário informar o valor do atributo nis.
     * @return boolean
     */
    public function inserir($n, $nis)
    {
        $pessoa = new Pessoa();

        $pessoa->setName(addslashes($n));
        $pessoa->setNis($nis);

        $result = $pessoa->save();
        return $result;
    }

    /**
     * Lógica para atualizar a Pessoa na tabela pessoa no banco de dados
     * @param string $n - É necessário informar o valor do atributo name.
     * @param string $i - É necessário informar o valor do atributo id.
     * @return boolean
     */
    public function editar($n, $i)
    {
        $pessoa = new Pessoa();

        $pessoa->setName(addslashes($n));
        $pessoa->setId(addslashes($i));

        $pessoa = $pessoa->update();
        return $result;
    }
}
