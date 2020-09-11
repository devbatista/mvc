<?php

namespace core;

use \core\Database;
use \ClanCats\Hydrahon\Builder;
use \ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class Model
{

    protected $_h;

    public function __construct()
    {
        $this->checkH();
    }

    public function checkH()
    {
        if ($this->_h == null) {
            $db = new Database();
            $db = $db->getInstance();
            $this->_h = new Builder('mysql', function ($query, $queryString, $queryParameters) use ($db) {
                $statement = $db->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof FetchableInterface) {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                }
            });
        }

        $this->_h = $this->_h->table($this->getTableName());
    }

    public function getTableName()
    {
        $className = explode('\\', get_called_class());
        $className = end($className);
        return strtolower($className) . 's';
    }

    public function select($fields = [])
    {
        $this->checkH();
        return $this->_h->select($fields);
    }

    public function insert($fields = [])
    {
        $this->checkH();
        return $this->_h->insert($fields);
    }

    public function update($fields = [])
    {
        $this->checkH();
        return $this->_h->update($fields);
    }

    public function delete()
    {
        $this->checkH();
        return $this->_h->delete();
    }
}
