<?php
require_once __DIR__ . '/../models/DangKyModel.php';
require_once __DIR__ . '/../models/SinhVienModel.php';
require_once __DIR__ . '/../models/HocPhanModel.php';
require_once __DIR__ . '/../config/database.php';

class DangKyController {
    private $model;
    private $sinhvienModel;
    private $hocphanModel;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->model = new DangKyModel($db);
        $this->sinhvienModel = new SinhVienModel($db);
        $this->hocphanModel = new HocPhanModel($db);
    }

    public function index() {
        $dangkys = $this->model->getAll();
        include __DIR__ . '/../views/dangky/list.php';
    }

    public function create() {
        $sinhviens = $this->sinhvienModel->getAll();
        $hocphans = $this->hocphanModel->getAll();
        include __DIR__ . '/../views/dangky/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sinhvien_id = $_POST['sinhvien_id'];
            $hocphan_id = $_POST['hocphan_id'];
            $this->model->create($sinhvien_id, $hocphan_id);
            header("Location: /dangky/index");
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: /dangky/index");
    }
}