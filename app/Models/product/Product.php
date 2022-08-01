<?php

abstract class Product
{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $product_type;
    private $details;
    protected $inputs;

    public function __construct()
    {}

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSKU($sku)
    {
        $this->sku = $sku;
    }

    public function getSKU()
    {
        return $this->sku;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    protected function setProductType($product_type)
    {
        $this->product_type = $product_type;
    }

    public function getProductType()
    {
        return $this->product_type;
    }

    abstract public function validateProductDetails();
    abstract public function getProductDetails();

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setInputs(array $inputs)
    {
        $this->inputs = $inputs;
    }

    public function setFields($obj)
    {
        $this->setID($obj->id);
        $this->setSKU($obj->sku);
        $this->setName($obj->name);
        $this->setPrice($obj->price);
        $this->setDetails($obj->details);
    }

    public function getFields()
    {
        return [
            'sku' => $this->getSKU(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'product_type' => $this->getProductType(),
            'details' => $this->getDetails(),
        ];
    }

}
