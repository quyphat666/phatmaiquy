<?php
require_once __DIR__ . '/../models/SinhVienModel.php';
require_once __DIR__ . '/../models/NganhModel.php';
require_once __DIR__ . '/../config/database.php';

class SinhVienController
{
    private $sinhvienModel;
    private $nganhModel;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->sinhvienModel = new SinhVienModel($conn);
        $this->nganhModel = new NganhModel($conn);
    }

    public function index()
    {
        $sinhviens = $this->sinhvienModel->getAll();
        include __DIR__ . '/../views/sinhvien/list.php';
    }

    public function create()
    {
        $nganhs = $this->nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/create.php';
    }

    public function store()
    {
        $ma_sv = $_POST['ma_sv'] ?? '';
        $ho_ten = $_POST['ho_ten'] ?? '';
        $gioi_tinh = $_POST['gioi_tinh'] ?? '';
        $ngay_sinh = $_POST['ngay_sinh'] ?? '';
        $ma_nganh = $_POST['ma_nganh'] ?? '';
        $hinh = '';

        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES['hinh']['name']);
            $uploadPath = 'uploads/' . $filename;
            if (!is_dir('uploads')) {
                mkdir('uploads');
            }
            move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadPath);
            $hinh = $filename;
        }

        $this->sinhvienModel->insert($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh);
        header('Location: ?url=sinhvien');
    }

    public function edit($id)
    {
        $sv = $this->sinhvienModel->find($id);
        $nganhs = $this->nganhModel->getAll();
        include __DIR__ . '/../views/sinhvien/edit.php';
    }

    public function update()
    {
        $ma_sv = $_POST['ma_sv'] ?? '';
        $ho_ten = $_POST['ho_ten'] ?? '';
        $gioi_tinh = $_POST['gioi_tinh'] ?? '';
        $ngay_sinh = $_POST['ngay_sinh'] ?? '';
        $ma_nganh = $_POST['ma_nganh'] ?? '';
        $hinh = $_POST['hinh_old'] ?? '';

        if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES['hinh']['name']);
            $uploadPath = 'uploads/' . $filename;
            move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadPath);
            $hinh = $filename;
        }

        $this->sinhvienModel->update($ma_sv, $ho_ten, $gioi_tinh, $ngay_sinh, $hinh, $ma_nganh);
        header('Location: ?url=sinhvien');
    }

    public function delete($id)
    {
        $this->sinhvienModel->delete($id);
        header('Location: ?url=sinhvien');
    }

    public function detail($id)
    {
        $sv = $this->sinhvienModel->find($id);
        $nganh = $this->nganhModel->find($sv['MaNganh'] ?? $sv['ma_nganh']);
        include __DIR__ . '/../views/sinhvien/detail.php';
    }
}