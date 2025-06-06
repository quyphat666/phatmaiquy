<?php
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
?>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger px-4">
<a class="navbar-brand fw-bold" href="/phatmaiquy/Product">🛍️ Cửa hàng</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
<!-- Menu trái -->
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="/phatmaiquy/Product">Sản phẩm</a>
</li>
<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
<li class="nav-item">
<a class="nav-link" href="/phatmaiquy/Product/add">Thêm sản phẩm</a>
</li>
<?php endif; ?>
<li class="nav-item">
<a class="nav-link" href="/phatmaiquy/Cart">🛒 Giỏ hàng</a>
</li>
</ul>

<!-- Menu phải -->
<ul class="navbar-nav">
<?php if (isset($_SESSION['user'])): ?>
<li class="nav-item me-2">
<span class="navbar-text text-white">
👤 Xin chào, <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong>
(<?= $_SESSION['user']['role'] ?>)
</span>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="/phatmaiquy/User/logout">Đăng xuất</a>
</li>
<?php else: ?>
<li class="nav-item">
<a class="nav-link text-white" href="/phatmaiquy/User/login">Đăng nhập</a>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="/phatmaiquy/User/register">Đăng ký</a>
</li>
<?php endif; ?>
</ul>
</div>
</nav>

<!-- Bootstrap JS (để toggle menu hoạt động) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>