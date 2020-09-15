<?php

namespace src\models;

use \core\Model;

class Usuario extends Model
{
    // $tableName e $db já estão declarados na class Model
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM $this->tableName");
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
