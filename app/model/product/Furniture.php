<?php

require_once 'app/model/product/Product.php';

class Furniture extends Product
{
    public function __construct()
    {
        $this->setProductType(get_class($this));
    }

    public function setDimensions($height, $width, $length)
    {
        $this->setDetails("{$height}x{$width}x{$length}");
    }

    public function getDimensions()
    {
        return $this->getDetails();
    }
    
    public function getProductDetails()
    {
        return "Dimension: {$this->getDimensions()}";
    }

}
