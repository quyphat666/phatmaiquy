<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8ed0f7;
            margin: 0;
            padding: 30px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 2px solid #59a5d8;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-weight: bold;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            margin: 0 8px;
            cursor: pointer;
        }

        .btn-save {
            background-color: #3498db;
            color: #fff;
        }

        .btn-back {
            background-color: #e67e22;
            color: #fff;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form method="POST" action="/phatmaiquy/Product/edit/<?php echo $product->getID(); ?>">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>

            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>

            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" value="<?= htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>

            <div class="actions">
                <button type="submit" class="btn btn-save">💾 Lưu thay đổi</button>
                <a href="/phatmaiquy/Product/list" class="btn btn-back">⬅ Quay lại</a>
            </div>
        </form>
    </div>
</body>

</html>
