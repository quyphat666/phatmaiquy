<?php include_once __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h3><i class="fas fa-user-edit"></i> Cập nhật thông tin sinh viên</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sv['MaSV'] ?? '' ?>">
        <input type="hidden" name="hinh_old" value="<?= $sv['Hinh'] ?? '' ?>">

        <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" value="<?= htmlspecialchars($sv['HoTen'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <select name="gioi_tinh" class="form-select">
                <option value="Nam" <?= ($sv['GioiTinh'] === 'Nam') ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= ($sv['GioiTinh'] === 'Nữ') ? 'selected' : '' ?>>Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
            <input type="date" name="ngay_sinh" class="form-control" value="<?= $sv['NgaySinh'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hình ảnh hiện tại:</label><br>
            <?php if (!empty($sv['Hinh'])): ?>
                <img src="/uploads/<?= htmlspecialchars($sv['Hinh']) ?>" width="100">
            <?php else: ?>
                Không có
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="hinh" class="form-label">Cập nhật hình mới (nếu có)</label>
            <input type="file" name="hinh" class="form-control">
        </div>

        <div class="mb-3">
            <label for="ma_nganh" class="form-label">Ngành học</label>
            <select name="ma_nganh" class="form-select">
                <?php foreach ($nganhs as $nganh): ?>
                    <option value="<?= $nganh['MaNganh'] ?>" <?= ($sv['MaNganh'] === $nganh['MaNganh']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($nganh['TenNganh']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="?url=sinhvien" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include_once __DIR__ . '/../shares/footer.php'; ?>