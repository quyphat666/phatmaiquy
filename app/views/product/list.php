<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #2f3640;
            margin-top: 30px;
        }

        a.button {
            display: inline-block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #44bd32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 20px auto;
        }

        li {
            background-color: #ffffff;
            border: 1px solid #dcdde1;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        li h2 {
            margin-top: 0;
            color: #192a56;
        }

        li p {
            margin: 5px 0 10px;
        }

        .product-image {
            max-width: 200px;
            max-height: 150px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            display: block;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
        }

        .actions a.edit {
            background-color: #273c75;
        }

        .actions a.delete {
            background-color: #c23616;
        }
    </style>
</head>

<body>
    <?php include 'app/views/shares/header.php'; ?>

    <h1>Danh sách sản phẩm</h1>

    <div style="text-align: center;">
        <a class="button" href="/phatmaiquy/Product/add">+ Thêm sản phẩm mới</a>
    </div>

    <ul>
    <?php foreach ($products as $product): ?>
    <li>
        <?php
        $imageFile = isset($product->image) && !empty($product->image)
            ? $product->image
            : 'default.png';

        $imagePath = "/phatmaiquy/uploads/" . htmlspecialchars($imageFile, ENT_QUOTES, 'UTF-8');
        ?>
        <img class="product-image" src="<?= $imagePath ?>" alt="Ảnh sản phẩm">

        <h2><?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>

        <p><?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>

        <p><strong>Giá:</strong> <?= htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>

        <div class="actions">
            <a class="edit" href="/phatmaiquy/Product/edit/<?= $product->id; ?>">Sửa</a>
            <a class="delete" href="/phatmaiquy/Product/delete/<?= $product->id; ?>"
               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
        </div>
    </li>
<?php endforeach; ?>
    </ul>
</body>

</html>