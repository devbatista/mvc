<?php

namespace core;

use \core\Database;

class Model
{

    protected $_h;
    public $db;
    
    public function __construct()
    {
        $this->db = new Database();
        $this->db = $this->db->getInstance();
    }

    public function getTableName()
    {
        $className = explode('\\', get_called_class());
        $className = end($className);
        return strtolower($className) . 's';
    }
}
