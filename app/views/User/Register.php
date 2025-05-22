<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #27ae60;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .success {
            color: green;
            margin-bottom: 15px;
            text-align: center;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #2980b9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Đăng ký tài khoản</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success"><?= htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <input type="password" name="confirm" placeholder="Nhập lại mật khẩu" required>

            <select name="role" required>
                <option value="user">Người dùng</option>
                <option value="admin">Quản trị viên</option>
            </select>

            <button type="submit">Đăng ký</button>
        </form>

        <div class="link">
            <p>Đã có tài khoản? <a href="/phatmaiquy/User/login">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>
