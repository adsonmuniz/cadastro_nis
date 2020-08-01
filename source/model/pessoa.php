<?php

class Pessoa 
{
    private $id;
    private $nis;
    private $name;

    /**
     * getters e setters
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($identity)
    {
        $this->id = $identity;
    }

    public function getNis()
    {
        return $this->nis;
    }

    public function setNis($nis)
    {
        $this->nis= $nis;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($nome)
    {
        $this->name = $nome;
    }

    // logica para listar todas as pessoas cadastradas
    public function listAll()
    {
        $query = "SELECT * FROM pessoa order by name";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para listar pessoa a partir do nome
    public function getByName()
    {
        $query = "SELECT * FROM pessoa WHERE name = '$this->name'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para listar pessoa a partir do NIS
    public function getByNis()
    {
        $query = "SELECT * FROM pessoa WHERE nis = '$this->nis'";
        $resultQuery = $this->connection()->query($query);//mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    // logica para salvar a pessoa no banco
    public function save()
    {
        $query = "INSERT INTO pessoa (name, nis) VALUES ('$this->name','$this->nis')";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }
    
    // logica para atualizar o nome da pessoa no banco
    public function update()
    {
        $query = "UPDATE pessoa SET name = '$this->name' WHERE id='$this->id'";
        $resultQuery = mysqli_query($this->connection(),$query);
        return $resultQuery;
    }

    // Connection
    private function connection()
    {
        $server = "localhost:3306";
        $user = "root";
        $password = "vera0912";
        $db = "cadastro_nis";

        $connection = new mysqli($server, $user, $password, $db);// mysqli_connect($server, $user, $password, $db);
        return $connection;
    }

    public function write_log($log_msg)
    {
        $log_filename = "logs";
        if (!file_exists($log_filename))
        {
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename.'/debug.log';
        file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
    
    }
}
