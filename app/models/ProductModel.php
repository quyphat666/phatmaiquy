<?php

class ProductModel
{
    // Thuộc tính của lớp ProductModel
    private $ID;
    private $Name;
    private $Description;
    private $Price;

    // Constructor để khởi tạo đối tượng ProductModel
    public function __construct($ID, $Name, $Description, $Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
    }

    // Getter và Setter cho thuộc tính ID
    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    // Getter và Setter cho thuộc tính Name
    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }
}
