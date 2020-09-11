<?php

namespace src\models;

use \core\Model;

class Usuario extends Model
{
    public function getAll()
    {
        $sql = $this->db->prepare("SELECT * FROM ".$this->getTableName()." ORDER BY id");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getByEmail($email)
    {
        $sql = $this->db->prepare('SELECT * FROM '.$this->getTableName().' WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        return $sql->rowCount();
    }

    public function getById($id)
    {
        $sql = $this->db->prepare("SELECT * FROM ".$this->getTableName()." WHERE id = :id");
        $sql->bindParam('id', $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function addUser($data)
    {
        $sql = $this->db->prepare("INSERT INTO ".$this->getTableName()." (nome, email) VALUES (:nome, :email)");
        $sql->bindParam(":nome", $data['nome']);
        $sql->bindParam(":email", $data['email']);

        return $sql->execute();;
    }

    public function editUser($data)
    {
        $sql = $this->db->prepare("UPDATE " . $this->getTableName() . " SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindParam(":nome", $data['nome']);
        $sql->bindParam(":email", $data['email']);
        $sql->bindParam(":id", $data['id']);

        return $sql->execute();;
    }

    public function delUser($id)
    {
        $sql = $this->db->prepare("DELETE FROM ".$this->getTableName()." WHERE id = :id");
        $sql->bindParam(":id", $id);

        return $sql->execute();
    
    }
}
