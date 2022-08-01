<?php

require_once MODEL_PATH . 'product/Product.php';

class Book extends Product
{
    public function __construct()
    {
        $this->setProductType(get_class($this));
    }

    public function setWeight($weight)
    {
        $this->setDetails($weight);
    }

    public function getWeight()
    {
        return $this->getDetails();
    }

    public function getProductDetails()
    {
        return "Weight: {$this->getWeight()}KG";
    }

    public function validateProductDetails()
    {
        if (isset($this->inputs['weight']) && is_numeric($this->inputs['weight']) && floatval($this->inputs['weight'] >= 0)) {
            $this->setWeight($this->inputs['weight']);
            return true;
        }

        return false;
    }
}
