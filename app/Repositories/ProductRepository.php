<?php

require_once 'app/Database.php';

require_once MODEL_PATH . 'product/DVD.php';
require_once MODEL_PATH . 'product/Book.php';
require_once MODEL_PATH . 'product/Furniture.php';

class ProductRepository
{
    private $_db;
    private static $INSTANCE = null;
    private $tableName = 'products';
    private $className = 'Product';

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new ProductRepository();
        }
        return self::$INSTANCE;
    }

    public function get()
    {
        $results = [];
        $tableData = $this->_db->get($this->tableName);

        foreach ($tableData as $row) {
            $className = ucfirst($row->product_type);
            $objRow = new $className();
            $objRow->setFields($row);
            $results[] = $objRow;
        }

        return $results;
    }

    public function findAll()
    {
        return $this->_db->get_info($this->tableName);
    }

    public function save(Product $product)
    {
        if ($this->_db->insert($this->tableName, $product->getFields())) {
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

    public function existsBySKU($sku)
    {
        return $this->existsByColumn('sku', $sku);
    }

    public function update($id, Product $product)
    {

        if ($this->_db->update($this->tableName, $product->getFields(), $id)) {
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
