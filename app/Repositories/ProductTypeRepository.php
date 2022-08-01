<?php

require MODEL_PATH . 'ProductType.php';

class ProductTypeRepository
{
    private $_db;
    private static $INSTANCE = null;
    private $tableName = 'product_types';
    private $className = 'ProductType';

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new ProductTypeRepository();
        }
        return self::$INSTANCE;
    }

    public function get()
    {
        return $this->_db->get($this->tableName, $this->className);
    }

    public function findAll()
    {
        return $this->_db->get_info($this->tableName);
    }

    public function save(ProductType $productType)
    {
        if ($this->_db->insert($this->tableName, $productType->getFields())) {
            return true;
        } else {
            return false;
        }
    }

    public function existsByColumn($columnName, $value)
    {
        $data = $this->_db->get_info($this->tableName, $columnName, $value);
        return empty($data) ? false : true;
    }

    public function existsById($id)
    {
        return $this->existsByColumn('id', $id);
    }

    public function existsClassName($class_name)
    {
        return $this->existsByColumn('class_name', $class_name);
    }

    public function update($id, ProductType $productType)
    {
        if ($this->_db->update($this->tableName, $productType->getFields(), $id)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        return $this->_db->delete($this->tableName, $id);
    }

}
