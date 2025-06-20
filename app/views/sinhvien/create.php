<?php include_once __DIR__ . '/../shares/header.php'; ?>

<div class="container mt-4">
    <h3><i class="fas fa-user-plus"></i> Thêm sinh viên</h3>
    <form action="?url=sinhvien/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" required>
        </div>
        <div class="mb-3">
    <label for="ma_sv" class="form-label">Mã sinh viên</label>
    <input type="text" name="ma_sv" class="form-control" required>
</div>

        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <select name="gioi_tinh" class="form-select">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
            <input type="date" name="ngay_sinh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hinh" class="form-label">Hình ảnh</label>
            <input type="file" name="hinh" class="form-control">
        </div>

        <div class="mb-3">
            <label for="ma_nganh" class="form-label">Ngành học</label>
            <select name="ma_nganh" class="form-select" required>
                <?php foreach ($nganhs as $nganh): ?>
                    <option value="<?= $nganh['MaNganh'] ?>"><?= htmlspecialchars($nganh['TenNganh']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Thêm sinh viên</button>
        <a href="?url=sinhvien" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include_once __DIR__ . '/../shares/footer.php'; ?>