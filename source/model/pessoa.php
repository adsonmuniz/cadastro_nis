<?php
/**
 * Classe que reproduz os atributos de uma pessoa na aplicação.
 */
class Pessoa 
{
    private $id;
    private $nis;
    private $name;

    /**
     * getters e setters
     */

    /**
     * Função para informar o id do objeto pessoa
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Função para atribuir o id do objeto pessoa
     * @return void
     */
    public function setId($identity)
    {
        $this->id = $identity;
    }

    /**
     * Função para informar o NIS do objeto pessoa
     * @return string
     */
    public function getNis()
    {
        return $this->nis;
    }

    /**
     * Função para atribuir o NIS do objeto pessoa
     * @return void
     */
    public function setNis($nis)
    {
        $this->nis= $nis;
    }

    /**
     * Função para informar o Nome do objeto pessoa
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Função para atribuir o Nome do objeto pessoa
     * @return void
     */
    public function setName($nome)
    {
        $this->name = $nome;
    }

    /**
     * Lógica para listar todas as pessoas cadastradas
     * @return array[Pessoa]
     */
    public function listAll()
    {
        $query = "SELECT * FROM pessoa order by name";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    /**
     * Lógica para listar a Pessoa a partir do id
     * @param integer $this->id - É necessário informar no controller o valor do atributo id a ser procurado.
     * @return Pessoa
     */
    public function getById()
    {
        $query = "SELECT * FROM pessoa WHERE id = '$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    /**
     * Lógica para listar a Pessoa a partir do nome
     * @param string $this->name - É necessário informar no controller o valor do atributo name a ser procurado.
     * @return Pessoa
     */
    public function getByName()
    {
        $query = "SELECT * FROM pessoa WHERE name = '$this->name'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    /**
     * Lógica para listar a Pessoa a partir do NIS
     * @param string $this->nis - É necessário informar no controller o valor do atributo NIS a ser procurado.
     * @return Pessoa
     */
    public function getByNis()
    {
        $query = "SELECT * FROM pessoa WHERE nis = '$this->nis'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    /**
     * Lógica para salvar a Pessoa na tabela pessoa no banco de dados
     * @param string $this->name - É necessário informar no controller o valor do atributo name.
     * @param string $this->nis - É necessário informar no controller o valor do atributo nis.
     * @return boolean
     */
    public function save()
    {
        $query = "INSERT INTO pessoa (name, nis) VALUES ('$this->name','$this->nis')";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    /**
     * Lógica para atualizar a Pessoa na tabela pessoa no banco de dados
     * @param string $this->name - É necessário informar no controller o valor do atributo name.
     * @param string $this->id - É necessário informar no controller o valor do atributo id.
     * @return boolean
     */
    public function update()
    {
        $query = "UPDATE pessoa SET name = '$this->name' WHERE id='$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    /**
     * Função para estabelecer conexão com a instância do banco de dados.
     */
    private function connection()
    {
        $server = "localhost:3306";
        $user = "root";
        $password = "";
        $db = "cadastro_nis";

        $connection = mysqli_connect($server, $user, $password, $db);
        return $connection;
    }
}
