<?php

class SinhVienModel
{
    private $conn;
    private $table = "sinhvien";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT sv.*, ng.TenNganh 
                FROM sinhvien sv 
                JOIN nganhhoc ng ON sv.MaNganh = ng.MaNganh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($ma_sv)
    {
        $sql = "SELECT * FROM sinhvien WHERE MaSV = :ma_sv";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_sv', $ma_sv);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh)
    {
        $sql = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES (:ma_sv, :ho_ten, :gioi_tinh, :ngay_sinh, :hinh, :ma_nganh)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_sv', $ma_sv);
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':ma_nganh', $ma_nganh);
        return $stmt->execute();
    }

    public function update($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh)
    {
        $sql = "UPDATE sinhvien SET 
                    HoTen = :ho_ten, 
                    GioiTinh = :gioi_tinh, 
                    NgaySinh = :ngay_sinh, 
                    Hinh = :hinh, 
                    MaNganh = :ma_nganh 
                WHERE MaSV = :ma_sv";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':ma_nganh', $ma_nganh);
        $stmt->bindParam(':ma_sv', $ma_sv);
        return $stmt->execute();
    }

    public function delete($ma_sv)
    {
        $sql = "DELETE FROM sinhvien WHERE MaSV = :ma_sv";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ma_sv', $ma_sv);
        return $stmt->execute();
    }
}