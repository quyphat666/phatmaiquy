<?php

class NganhModel
{
    private $conn;
    private $table = "nganhhoc";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($ma_nganh)
    {
        $sql = "SELECT * FROM $this->table WHERE MaNganh = :ma_nganh";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_nganh', $ma_nganh);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}