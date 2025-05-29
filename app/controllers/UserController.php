<?php
require_once 'app/models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        session_start();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findUser($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                // ✅ Gọi trực tiếp ProductController để hiển thị danh sách
                require_once 'app/controllers/ProductController.php';
                $productController = new ProductController();
                $productController->index(); // gọi hàm index (hiển thị list.php)
                exit();
            } else {
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng';
            }
        }

        include 'app/views/User/Login.php';
    }

    public function register() {
        session_start();
        $error = '';
        $success = '';
        $fullname = $_POST['fullname'] ?? '';
        


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm'] ?? '';
            $role = $_POST['role'] ?? 'user';

            if ($password !== $confirm) {
                $error = 'Mật khẩu xác nhận không khớp.';
            } elseif (empty($username) || empty($password)) {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } elseif (!in_array($role, ['admin', 'user'])) {
                $error = 'Vai trò không hợp lệ.';
            } elseif ($this->userModel->findUser($username)) {
                $error = 'Tên đăng nhập đã tồn tại.';
            } else {
                $this->userModel->createUser($username, $fullname, $password, $role);

                $success = 'Đăng ký thành công! Bạn có thể đăng nhập.';
            }
        }

        include 'app/views/User/Register.php';
    }

    public function logout() {
        session_start();
        session_destroy();

        // Đưa về lại trang đăng nhập
        header('Location: /phatmaiquy/User/login');
        exit();
    }
}
