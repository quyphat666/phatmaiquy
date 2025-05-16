<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #eef3f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            display: flex;
            gap: 20px;
        }

        .form-box {
            flex: 1;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        h2 {
            margin-top: 0;
            color: #2c3e50;
            margin-bottom: 24px;
            font-size: 22px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn-cancel {
            background-color: #e74c3c;
        }

        .btn-cancel:hover {
            background-color: #c0392b;
        }

        .actions {
            text-align: right;
        }

        .errors {
            background-color: #ffe6e6;
            border-left: 5px solid #e74c3c;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            color: #c0392b;
        }

        .preview {
            margin-top: 10px;
            max-width: 200px;
            display: none;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
    </style>
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let errors = [];

            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }

            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là số dương lớn hơn 0.');
            }

            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }

            return true;
        }

        function previewImage() {
            const input = document.getElementById('image');
            const preview = document.getElementById('preview');
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h2>🛒 Thêm sản phẩm mới</h2>

            <?php if (!empty($errors)): ?>
                <div class="errors">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="/phatmaiquy/Product/add" enctype="multipart/form-data" onsubmit="return validateForm();">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Mô tả:</label>
                <textarea id="description" name="description" rows="3" required></textarea>

                <label for="price">Giá (VND):</label>
                <input type="number" id="price" name="price" step="0.01" required>

                <label for="image">Hình ảnh sản phẩm:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                <img id="preview" class="preview" src="" alt="Xem trước ảnh sản phẩm" />

                <div class="actions">
                    <button class="btn" type="submit">💾 Lưu sản phẩm</button>
                    <a class="btn btn-cancel" href="/phatmaiquy/Product/list">⬅ Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
