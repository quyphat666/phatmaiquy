<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div style="background-color: #2c3e50; padding: 15px 30px; color: white; display: flex; justify-content: space-between; align-items: center;">
    <div style="font-weight: bold; font-size: 18px;">Hệ thống quản lý sản phẩm</div>
    <div>
        <?php if (isset($_SESSION['user'])): ?>
            Xin chào, <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong> |
            <a href="/phatmaiquy/User/logout" style="color: #f39c12; text-decoration: none;">Đăng xuất</a>
        <?php else: ?>
            <a href="/phatmaiquy/User/login" style="color: #ecf0f1; text-decoration: none;">Đăng nhập</a>
        <?php endif; ?>
    </div>
</div>
