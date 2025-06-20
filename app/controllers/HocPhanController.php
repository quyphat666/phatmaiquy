<?php
require_once __DIR__ . '/../models/HocPhanModel.php';
require_once __DIR__ . '/../config/database.php';

class HocPhanController {
    private $model;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->model = new HocPhanModel($db);
    }

    public function index() {
        $hocphans = $this->model->getAll();
        include __DIR__ . '/../views/hocphan/list.php';
    }

    public function create() {
        include __DIR__ . '/../views/hocphan/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahp' => $_POST['mahp'],
                'tenhp' => $_POST['tenhp'],
                'sotinchi' => $_POST['sotinchi'],
            ];
            $this->model->create($data);
            header("Location: ?url=hocphan");
        }
    }

    public function edit($id) {
        $hp = $this->model->getById($id);
        include __DIR__ . '/../views/hocphan/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahp' => $_POST['mahp'],
                'tenhp' => $_POST['tenhp'],
                'sotinchi' => $_POST['sotinchi'],
            ];
            $this->model->update($id, $data);
            header("Location: ?url=hocphan");
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: ?url=hocphan");
    }
}