<?php

require_once 'app/model/product/Product.php';

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

}
