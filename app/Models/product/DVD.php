<?php

require_once MODEL_PATH . 'product/Product.php';

class DVD extends Product
{
    public function __construct()
    {
        $this->setProductType(get_class($this));
    }

    public function setSize($size)
    {
        $this->setDetails($size);
    }

    public function getSize()
    {
        return $this->getDetails();
    }

    public function getProductDetails()
    {
        return "Size: {$this->getSize()} MB";
    }

    public function validateProductDetails()
    {
        if (isset($this->inputs['size']) && is_numeric($this->inputs['size']) && floatval($this->inputs['size'] >= 0)) {
            $this->setSize($this->inputs['size']);
            return true;
        }

        return false;
    }

}
