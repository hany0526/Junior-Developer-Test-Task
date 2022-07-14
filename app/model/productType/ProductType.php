<?php

class ProductType
{
    private $id;
    private $class_name;
    private $name;

    public function __construct() { }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
    }

    public function getClassName()
    {
        return $this->class_name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFields()
    {
        return [
            'class_name' => $this->getClassName(),
            'name' => $this->getName(),
        ];

    }

}
