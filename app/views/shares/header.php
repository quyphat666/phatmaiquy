<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/phatmaiquy/Product">Quản lý sản phẩm</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/phatmaiquy/Product">Danh sách sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/phatmaiquy/Product/add">Thêm sản phẩm</a>
            </li>
        </ul>

        <!-- Hiển thị tên người dùng và nút logout -->
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <span class="nav-link">👤 Xin chào, <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="/phatmaiquy/User/logout">Đăng xuất</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/phatmaiquy/User/login">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/phatmaiquy/User/register">Đăng ký</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
