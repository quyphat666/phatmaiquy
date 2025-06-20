<?php include_once __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h3><i class="fas fa-info-circle"></i> Chi tiết Sinh viên</h3>

    <table class="table table-striped">
        <tr>
            <th>Mã sinh viên:</th>
            <td><?= htmlspecialchars($sv['MaSV']) ?></td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><?= htmlspecialchars($sv['HoTen']) ?></td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
        </tr>
        <tr>
            <th>Ngành:</th>
            <td><?= htmlspecialchars($nganh['TenNganh'] ?? 'Không rõ') ?></td>
        </tr>
        <tr>
            <th>Hình ảnh:</th>
            <td>
                <?php if (!empty($sv['Hinh'])): ?>
                    <img src="/uploads/<?= $sv['Hinh'] ?>" width="150">
                <?php else: ?>
                    Không có ảnh
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <a href="?url=sinhvien" class="btn btn-secondary">Quay lại</a>
</div>

<?php include_once __DIR__ . '/../shares/footer.php'; ?>