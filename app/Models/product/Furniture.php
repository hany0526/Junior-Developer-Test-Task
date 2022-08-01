<?php

require_once MODEL_PATH . 'product/Product.php';

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

    public function validateProductDetails()
    {
        if (is_numeric($this->inputs['height']) && is_numeric($this->inputs['width']) && is_numeric($this->inputs['length']) && floatval($this->inputs['height'] >= 0) && floatval($this->inputs['width'] >= 0) && floatval($this->inputs['length'] >= 0)) {
            $this->setDimensions($this->inputs['height'], $this->inputs['width'], $this->inputs['length']);
            return true;
        }

        return false;
    }

}
