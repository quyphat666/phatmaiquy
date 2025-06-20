<?php
class DangKyModel {
    private $conn;
    private $table = "dangky";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT dk.id, sv.masv, sv.hoten, hp.mahp, hp.tenhp 
                  FROM dangky dk
                  JOIN sinhvien sv ON dk.sinhvien_id = sv.id
                  JOIN hocphan hp ON dk.hocphan_id = hp.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($sinhvien_id, $hocphan_id) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (sinhvien_id, hocphan_id) VALUES (:sinhvien_id, :hocphan_id)");
        $stmt->bindParam(":sinhvien_id", $sinhvien_id);
        $stmt->bindParam(":hocphan_id", $hocphan_id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}