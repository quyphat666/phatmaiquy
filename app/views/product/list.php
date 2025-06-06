<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách sản phẩm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
background-color: #f8f9fa;
font-family: 'Segoe UI', sans-serif;
}

.navbar {
background-color: #d63031;
}

.navbar-brand {
color: white !important;
font-weight: bold;
font-size: 1.5rem;
}

.product-card {
border: 1px solid #dee2e6;
border-radius: 8px;
transition: box-shadow 0.3s ease;
}

.product-card:hover {
box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
}

.product-image {
width: 100%;
height: 200px;
object-fit: cover;
}

.btn-add, .btn-cart {
background-color: #ff4757;
border: none;
color: white;
}

.btn-add:hover, .btn-cart:hover {
background-color: #e84118;
}

.btn-edit {
background-color: #1e90ff;
color: white;
}

.btn-delete {
background-color: #e74c3c;
color: white;
}

.btn-edit:hover {
background-color: #3498db;
}

.btn-delete:hover {
background-color: #c0392b;
}

.price-tag {
font-weight: bold;
color: #e67e22;
}

.card-body h5 {
font-size: 1.1rem;
}

footer {
background-color: #dcdde1;
padding: 1rem;
text-align: center;
font-size: 0.9rem;
color: #636e72;
}
</style>
</head>
<body>

<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
<div class="d-flex justify-content-between align-items-center mb-4">
<h2 class="text-dark">📦 Sản phẩm mới</h2>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
<a class="btn btn-add" href="/phatmaiquy/Product/add">+ Thêm sản phẩm</a>
<?php endif; ?>
</div>

<div class="row">
<?php foreach ($products as $product): ?>
<?php
$image = !empty($product->image) ? $product->image : 'default.png';
$imgPath = "/phatmaiquy/uploads/" . htmlspecialchars($image);
?>
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
<div class="card product-card h-100">
<img src="<?= $imgPath ?>" class="product-image" alt="Ảnh sản phẩm">
<div class="card-body d-flex flex-column">
<h5><?= htmlspecialchars($product->name) ?></h5>
<p><?= htmlspecialchars($product->description) ?></p>
<div class="price-tag mb-3"><?= number_format($product->price, 0, ',', '.') ?> VND</div>

<div class="mt-auto">
<a href="/phatmaiquy/Cart/add/<?= $product->id ?>" class="btn btn-cart w-100 mb-2">🛒 Thêm vào giỏ</a>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
<a href="/phatmaiquy/Product/edit/<?= $product->id ?>" class="btn btn-edit w-100 mb-2">✏️ Sửa</a>
<a href="/phatmaiquy/Product/delete/<?= $product->id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" class="btn btn-delete w-100">🗑️ Xóa</a>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>

<footer>
© <?= date('Y') ?> Cửa hàng công nghệ - Bản quyền thuộc về bạn
</footer>

</body>
</html>