<?php

class HocPhanModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM hocphan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // sử dụng mảng kết hợp
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM hocphan WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO hocphan (MaHP, TenHP, SoTinChi) VALUES (:mahp, :tenhp, :sotinchi)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mahp', $data['mahp']);
        $stmt->bindParam(':tenhp', $data['tenhp']);
        $stmt->bindParam(':sotinchi', $data['sotinchi']);
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE hocphan SET MaHP = :mahp, TenHP = :tenhp, SoTinChi = :sotinchi WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':mahp', $data['mahp']);
        $stmt->bindParam(':tenhp', $data['tenhp']);
        $stmt->bindParam(':sotinchi', $data['sotinchi']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM hocphan WHERE ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}