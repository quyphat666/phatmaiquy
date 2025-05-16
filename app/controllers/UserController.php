<?php
class UserController
{
    public function login()
    {
        session_start();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $users = [];
            if (file_exists('users.json')) {
                $users = json_decode(file_get_contents('users.json'), true);
            }

            if (isset($users[$username]) && $users[$username]['password'] === $password) {
                $_SESSION['user'] = [
                    'username' => $username,
                    'role' => $users[$username]['role']
                ];
                header('Location: /phatmaiquy/Product/list');
                exit();
            } else {
                $error = 'Tên đăng nhập hoặc mật khẩu không đúng';
            }
        }

        include 'app/views/User/Login.php';
    }

    public function register()
    {
        session_start();
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm'] ?? '';

            if ($password !== $confirm) {
                $error = 'Mật khẩu xác nhận không khớp.';
            } elseif (empty($username) || empty($password)) {
                $error = 'Vui lòng nhập đầy đủ thông tin.';
            } else {
                $users = [];
                if (file_exists('users.json')) {
                    $users = json_decode(file_get_contents('users.json'), true);
                }

                if (isset($users[$username])) {
                    $error = 'Tên đăng nhập đã tồn tại.';
                } else {
                    $users[$username] = [
                        'password' => $password,
                        'role' => 'user'
                    ];
                    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
                    $success = 'Đăng ký thành công! Bạn có thể đăng nhập.';
                }
            }
        }

        include 'app/views/User/Register.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /phatmaiquy/User/login');
        exit();
    }
}