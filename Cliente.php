<?php

class Cliente
{
    private $db;

    private $id;
    private $nome;
    private $email;


    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function find($id){
        $query = "Select * from clientes where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null){

        if($ordem){
            $query = "Select * from clientes order by {$ordem}";
        }else{
            $query = "Select * from clientes";
        }


        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inserir(){
        $query = "INSERT INTO clientes(nome,email) VALUES (:nome, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":email", $this->getEmail());

        if($stmt->execute()){
            return true;
        }
    }

    public function alterar(){
        $query = "Update clientes set nome=:nome, email=:email where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $this->getId());
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":email", $this->getEmail());

        if($stmt->execute()){
            return true;
        }
    }

    public function deletar($id){
        $query = "Delete from clientes where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);

        if($stmt->execute()){
            return true;
        }
    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;

    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


}